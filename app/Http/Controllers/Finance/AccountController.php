<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\Account;
use App\Models\Finance\AccountCategory;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function viewAccount(Request $request){
        return view("pages.finance.accounts.add_account");
    }
    
    public function getAllAccount()
    {
        $query = Account::query();

        $query->where('deleted_at', null);

        $account = $query
            ->orderBy("id", "ASC")
            ->get();

        $accountData = [];
        if (sizeof($account) > 0) {

            foreach ($account as $data) {
                $accountArray[] = [
                    "id" => $data->id,
                    "name" => $data->name,
                    "number" => $data->number,
                    "category" => $data->category,
                    "balance" => $data->balance,
                    "tax_name" => $data->tax_name
                ];
            }

            $accountData = $accountArray;

            return view("pages.finance.accounts.account",["data" => $accountData]);
        
        } else {

            return response()->json([
                "success" => false,
                "data" => $accountData
            ]);

        }

        return response()->json([
            "success" => false,
            "data" => $accountData
        ]);

    }

    public function getAllAccountCategory()
    {
        $query = AccountCategory::query();
        
        $query->where('name', '!=', null);
        
        $accountCat = $query
        ->orderBy("id", "ASC")
        ->get();

        $accountCatData = [];
        if (sizeof($accountCat) > 0) {

            foreach ($accountCat as $data) {
                $accountCatArray[] = [
                    "id" => $data->id,
                    "name" => $data->name,
                    "name_bahasa" => $data->name_bahasa,
                    "account_type_id" => $data->account_type_id,
                ];
                
                $checkCat = Account::where('category_id', $data->id)->orderBy('number', 'desc')->first();

                if(isset($checkCat->number)){
                    $number = explode("-", $checkCat->number);
                    $numberRef = $number[0]."-".($number[1]+1);
                } else{
                    $numberRef = $data->account_type_id."-".$data->account_type_id."0000";
                }

                $accountCatRef[] = [
                    $data->id => $numberRef
                ];
            }

            $accountCatData["category"] = $accountCatArray;       
            
            $accountCatData["code_refference"] = $accountCatRef;

            return response()->json([
                "success" => true,
                "data" => $accountCatData["category"],
                "dataref" => $accountCatData["code_refference"]
            ]);

        } else {

            return response()->json([
                "success" => false,
                "data" => $accountCatData
            ]);
        }
    }

    public function selectCategory(Request $request)
    {
        $rq = $request->all();
        $getCate = Account::where('category_id', $rq['id_cate'])->first();
        // print_r($getCate);
        if (isset($getCate)) {
            return response()->json([
                "success" => true,
                "data" => $getCate,
                // "message" => "Sudah ada referensi Kode Akun"
            ]);
        } else {
            return response()->json([
                "success" => false,
                "data" => [],
                // "message" => "Belum ada referensi Kode Akun"
            ]);
        }
    }

    public function addAccount(Request $request)
    {
        $rq = $request->all();

        $query = Account::where('name', $rq['name'])->first();
        
        if(isset($query->name)){
            return response()->json([
                "success" => false,
                "message" => 'Data Account dengan nama tersebut sudah ada'
            ]);
        }

        $getNameCate = AccountCategory::where('id', $rq['category_id'])->first();
       
        $dataInsertAccount = [];

        $dataInsertAccount[] = [
            "name" => $rq['name'],
            "number" => $rq['number'],
            "category_id" => $rq['category_id'],
            "category" => $getNameCate->name,
            "balance" => "Rp. ".$rq['balance'],
            "balance_amount" => $rq['balance'],
        ];

        $insertAccount = Account::insert($dataInsertAccount);

        if($insertAccount){

            return response()->json([
                "success" => true,
                "message"=> 'Data Account berhasil disimpan',
            ]);

        } else{
            
            return response()->json([
                "success" => false,
                "message"=> 'Data Account gagal disimpan',
            ]);
        }
    }

    public function deleteAccount(Request $request)
    {
        $rq = $request->all();

        if (!empty($rq['id'])) {

            $account = Account::find($rq['id']);
            $account->delete();

            return response()->json([
                "success" => true,
                "message" => "Delete Account Berhasil!"
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Delete Account Gagal!"
            ]);
        }
    }
}

