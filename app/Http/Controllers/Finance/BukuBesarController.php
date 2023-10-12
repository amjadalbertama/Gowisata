<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Ledger;
use App\Models\Finance\LedgerDetail;
use Illuminate\Http\Request;

class BukuBesarController extends Controller
{
    public function getBukuBesar(Request $request)
    {
        $rq = $request->all();
        $query = Ledger::query();

        $query->where('deleted_at', null);
        $ledgerData = [];

        
        if (isset($rq["account_name"]) && $rq["account_name"] != "" || isset($rq["account_name"]) && $rq["account_name"] != null) {
            $query->where('account_name', $rq["account_name"]);

            $ledger = $query
            ->orderBy("id", "ASC")
            ->get();

            if (sizeof($ledger) > 0) {
                
                foreach ($ledger as $data) {

                    $ledgerDetail = LedgerDetail::where('ledger_id', $data->id)->get()->toArray();

                    if($ledgerDetail == null || $ledgerDetail == ""){
                        
                        return response()->json([
                            "success" => false,
                            "data" => [],
                            "message" => "Data Buku Besar Tidak Tersedia!"
                        ]);
                        
                    } else {

                        $ledgerArray[] = [
                            "account_code" => $data->account_code,
                            "account_name" => $data->account_name,
                            "start_balance" => $data->start_balance,
                            "end_balance" => $data->end_balance,
                            "detail" => $ledgerDetail
                        ];
                    }
                }
                
                $ledgerData = $ledgerArray;

                return response()->json([
                    "success" => true,
                    "data" => $ledgerData,
                    "nameled" => $ledger,
                    "message" => "Data Buku Besar Tersedia!"
                ]);

            } else {

                return response()->json([
                    "success" => false,
                    "data" => [],
                    "message" => "Data Buku Besar Tidak Tersedia!"
                ]);
                
            }
        }else{

            $listLed = Ledger::get();

            return view("pages.finance.buku_besar.buku_besar", ['ledger_data' => $listLed]);
        }
    }
}
