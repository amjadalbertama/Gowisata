<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Account;
use App\Models\Finance\Sales;
use App\Models\Finance\Jurnal;
use App\Models\Finance\Ledger;
use App\Models\Finance\LedgerDetail;
use App\Models\Finance\SalesItem;
use App\Models\Finance\SalesPayment;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function jurnalTransaksi(Request $request)
    {
        $rq = $request->all();

        $query = Jurnal::query();
        $jurnalData = [];

        if (isset($rq["jurnal_date"]) && $rq["jurnal_date"] != "" || isset($rq["jurnal_date"]) && $rq["jurnal_date"] != null) {

            $date = \Carbon\Carbon::parse($rq["jurnal_date"])->format('Y-m-d');

            $query->where('jurnal_date', $date);

            $salesJurnal = $query
            ->orderBy("id", "ASC")
            ->get();

            if(sizeof($salesJurnal) > 0){

                foreach ($salesJurnal as $data) {
                    $jurnalData[] = [
                        "jurnal_date" => $data->jurnal_date,
                        "description" => $data->description,
                        "debit" => $data->debit,
                        "credit" => $data->credit,
                        "trans_reference" => $data->trans_reference
                    ];
                }
               
                return response()->json([
                    "success" => true,
                    "data"=> $jurnalData,
                    "message"=> 'Data jurnal Tersedia',
                ]);

            } else{

                return response()->json([
                    "success" => false,
                    "data"=> $jurnalData,
                    "message"=> 'Data jurnal Tidak Tersedia',
                ]);

            }
        } else{
            // return response()->json([
            //     "success" => false,
            //     "data"=> $jurnalData,
            // ]);

        }

        return view("pages.finance.jurnal", ['sales_jurnal' => $jurnalData]);
    }

    public function addJurnal(Request $request)
    {
        $rq = $request->all();

        $query = SalesPayment::query();
        $query->leftJoin('ospos_sales', 'ospos_sales.sale_id', '=', 'ospos_sales_payments.sale_id');
        $query->select(
            'ospos_sales_payments.sale_id',
            'ospos_sales_payments.payment_amount',
            'ospos_sales_payments.cash_refund',
            'ospos_sales_payments.payment_type',
            'ospos_sales.sale_time',
            'ospos_sales.sale_status'
        );
        $query->where('ospos_sales.sale_status', 0);

        $from = \Carbon\Carbon::parse($rq["jurnal_date"])->format('Y-m-d 00:00:00');
        $to = \Carbon\Carbon::parse($rq["jurnal_date"])->format('Y-m-d 23:59:59');
        $parseDate = \Carbon\Carbon::parse($rq["jurnal_date"])->format('Y-m-d');

        $query->whereBetween('sale_time', [$from, $to]);

        $salesRecap = $query
        ->orderBy("sale_id", "ASC")
        ->get();

        $queryHPP = SalesItem::query();
        $queryHPP->whereIn('sale_id', array_unique(array_column($salesRecap->toArray(), 'sale_id')));
        $queryHPP->select(
            'sale_id',
            'item_id',
            'quantity_purchased',
            'item_cost_price',
            'item_unit_price'
        );
        $salesCost = $queryHPP->get();

        $jurnalCollect = $salesRecap->collect()->groupBy('payment_type');
        $dataInsertJurnal = [];
        $arrayDesc = ['Penjualan POS', 'Harga Pokok Penjualan', "Persediaan"];

        foreach ($jurnalCollect as $dataCollectKey => $dataCollectVal) {
            if($dataCollectKey != 'Cheque'){
                $sumDataCollect =  array_sum(array_column($dataCollectVal->toArray(), 'payment_amount'));
                $getAccount = Account::where('name', $dataCollectKey)->select('id')->first();
                $getLedger = Ledger::where('account_name', $dataCollectKey)->first();
    
                if(isset($getAccount->id)){
                    $accountId = $getAccount->id;
                } else{
                    $accountId = null;
                }
                $dataInsertJurnal[] = [
                    "jurnal_date" => $parseDate,
                    "description" => $dataCollectKey,
                    "account_id" => $accountId,
                    "debit" => $sumDataCollect,
                    "credit" => 0,
                    "trans_reference" => "POS ".$parseDate
                ];
                $dataInsertLedger[] = [
                    "ledger_id" => $getLedger->id,
                    "ledger_date" => $parseDate,
                    "jurnal_refference" => "POS ".$parseDate,
                    "debit" => $sumDataCollect,
                    "credit" => 0,
                ];
            }
        }

        for ($i=0; $i < 3; $i++) { 
            $getAccount = Account::where('name', $arrayDesc[$i])->select('id')->first();
            $getLedger = Ledger::where('account_name', $arrayDesc[$i])->select('id')->first();

            if(isset($getAccount->id)){
                $accountId = $getAccount->id;
            } else{
                $accountId = null;
            }
            if($i == 0){
                $dataInsertJurnal[] = [
                    "jurnal_date" => $parseDate,
                    "description" => $arrayDesc[$i],
                    "account_id" => $accountId,
                    "debit" => 0,
                    "credit" => array_sum(array_column($salesRecap->toArray(), 'payment_amount')),
                    "trans_reference" => "POS ".$parseDate
                ];
                $dataInsertLedger[] = [
                    "ledger_id" => $getLedger->id,
                    "ledger_date" => $parseDate,
                    "jurnal_refference" => "POS ".$parseDate,
                    "debit" => 0,
                    "credit" => array_sum(array_column($salesRecap->toArray(), 'payment_amount')),
                ];
            } elseif ($i == 1) {
                $dataInsertJurnal[] = [
                    "jurnal_date" => $parseDate,
                    "description" => $arrayDesc[$i],
                    "account_id" => $accountId,
                    "debit" => array_sum(array_column($salesCost->toArray(), 'item_cost_price')),
                    "credit" => 0,
                    "trans_reference" => "POS ".$parseDate
                ];
                $dataInsertLedger[] = [
                    "ledger_id" => $getLedger->id,
                    "ledger_date" => $parseDate,
                    "jurnal_refference" => "POS ".$parseDate,
                    "debit" => array_sum(array_column($salesCost->toArray(), 'item_cost_price')),
                    "credit" => 0,
                ];
            } else{
                $dataInsertJurnal[] = [
                    "jurnal_date" => $parseDate,
                    "description" => $arrayDesc[$i],
                    "account_id" => $accountId,
                    "debit" => 0,
                    "credit" => array_sum(array_column($salesCost->toArray(), 'item_cost_price')),
                    "trans_reference" => "POS ".$parseDate
                ];
                $dataInsertLedger[] = [
                    "ledger_id" => $getLedger->id,
                    "ledger_date" => $parseDate,
                    "jurnal_refference" => "POS ".$parseDate,
                    "debit" => 0,
                    "credit" => array_sum(array_column($salesCost->toArray(), 'item_cost_price')),
                ];
            }
            
        }
        
        $dataLedger['detail'] = $dataInsertLedger;

        $this->insertDataLedger($dataLedger);
        $insertJurnal = Jurnal::insert($dataInsertJurnal);

        if($insertJurnal){

            return response()->json([
                "success" => true,
                "date_post" => $rq["jurnal_date"],
                "message"=> 'Data jurnal berhasil diposting',
            ]);

        } else{
            return response()->json([
                "success" => false,
                "date_post" => $rq["jurnal_date"],
                "message"=> 'Data jurnal gagal diposting',
            ]);
        }
    }

    private function insertDataLedger($dataInsert)
    {
        $insertLedger = LedgerDetail::insert($dataInsert['detail']);

        foreach ($dataInsert['detail'] as $ledger) {
            $getLedger = Ledger::where('id', $ledger['ledger_id'])->first();
            if($getLedger->end_balance != 0){
                $ledgerBalance = $getLedger->end_balance + $ledger['debit'] - $ledger['credit'];
            }else{
                $ledgerBalance = $getLedger->start_balance + $ledger['debit'] - $ledger['credit'];
            }

            $updateLedger = Ledger::where('id', $ledger['ledger_id'])->update([
                "end_balance" => $ledgerBalance
            ]);
        }

    }
}
