<?php

namespace App\Http\Controllers\Finance;
use App\Http\Controllers\Controller;
use App\Models\Finance\Sales;
use App\Models\Finance\SalesPayment;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function rekapTransaksi(Request $request)
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

        if (isset($rq["sales_date"]) && $rq["sales_date"] != "" || isset($rq["sales_date"]) && $rq["sales_date"] != null) {

            $from = \Carbon\Carbon::parse($rq["sales_date"])->format('Y-m-d 00:00:00');
            $to = \Carbon\Carbon::parse($rq["sales_date"])->format('Y-m-d 23:59:59');

            $query->whereBetween('sale_time', [$from, $to]);

            $salesRecap = $query
            ->orderBy("sale_id", "ASC")
            ->get();

            $recapData = [];
            if(sizeof($salesRecap) > 0){

                foreach ($salesRecap as $data) {
                    $recapArray[] = [
                        "sale_id" => $data->sale_id,
                        "payment_amount" => $data->payment_amount,
                        "refund_amount" => $data->cash_refund,
                        "payment_method" => $data->payment_type,
                        "sale_time" => $data->sale_time
                    ];
                }

                $recapData["data_recap"] = $recapArray;       
    
                $recapData["total_amount"] = array_sum(array_column($recapData["data_recap"], 'payment_amount'));
               
                return response()->json([
                    "success" => true,
                    "data"=> $recapData["data_recap"],
                    "jumlah"=> $recapData["total_amount"],
                ]);

            } else{

                $recapData["data_recap"] = [];       
    
                $recapData["total_amount"] = 0;

            }
        } else{
            $recapData["data_recap"] = [];       
    
            $recapData["total_amount"] = 0;

        }

        return view("pages.finance.transaksi", ['sales_recap' => $recapData]);
    }

    public function jurnal()
    {
        return view("pages.finance.jurnal");
    }
}
