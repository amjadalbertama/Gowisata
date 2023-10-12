<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;


class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        // $query = Companies::query();
        // $token = $request->header('Authorization');
        // $response = Http::withHeaders([
        //     'Authorization' => 'bearer '. $token,
        // ])->get('https://jakarta.wednesday.my.id/api/company/all');
        // $konvert = json_decode($response->body());
        // dd($token);
        return view('pages.companies.index');
    }

    public function formAdd(Request $request)
    {
        return view('pages.companies.add');
    }
    
    public function saveAddNew(Request $request)
    {
        $rq = $request->all();
    
        try{

            $insert = [
                'name' => $rq['name_to'],
                'username' => $rq['username_to'],
                'email' => $rq['email_to'],
                'phone' => $rq['phone_to'],
                'password' => $rq['password_to'],
                'password_confirmation' => $rq['password_confirmation_to'],
                'type' => "web",
                'acc_type' => "b2b",
            ];
    
            $response = Http::post('https://jakarta.wednesday.my.id/api/user/register', $insert);
            $konvert = json_decode($response->body());
            // $tes = $rq['get_token_to'][0];
            // print_r($konvert);
            // return view('tes',['tes'=>$konvert->success]);
        $login = [
            'login' => $rq["email_to"],
            'password' => $rq["password_to"],
            'type' => "web",
            'acc_type' => "b2b",
        ];
        // print_r($insert);
        // return view('tes',['tes'=>$insert]);
        $response = Http::post('https://jakarta.wednesday.my.id/api/user/login', $login);
        // print_r($response);
        $login = json_decode($response->body());
        // print_r($login);
        // print_r($login->data->access_token);
      
                // print_r($profile);
                //    return view('tes',['tes'=>$profile]);
            if (isset($konvert->success)) {

                $getuser = Http::withHeaders([
                    'Authorization' => 'bearer '.$login->data->access_token,
                ])->get('https://jakarta.wednesday.my.id/api/user/user-profile');
                    
                $profile= json_decode($getuser->body());

                // $getuser = Http::withHeaders([
                //     'Authorization' => 'bearer '.$rq['get_token_to'],
                // ])->get('https://jakarta.wednesday.my.id/api/user/user-profile');
        
                // $profile= json_decode($getuser->body());
                    // dd($profile);
                $company = [
                    'name_company' => $rq['name_company_to'],
                    'office_address' => $rq['address_companies_to'],
                    'office_email' => $rq['email_office_to'],
                    'office_phone' =>  $rq['phone_office_to'],
                    'npwp_company' =>  $rq['npwp_companies_to'],
                    'approver_id' => $profile->data->id,
                ];

                $companies = Companies::insertGetId($company);

                // return view('login.index')->with('register_btc');
                // return redirect()->route('login.index');
              
                    return response()->json([
                        'success' => true,
                        'message' => "success",
                        // 'prev_url' => route('companies'),
                    ]);
             
            }else{
                // return redirect()->back()->with('fail', "register gagal");
                return response()->json([
                    'success' => false,
                    'data'=> $konvert,
                    'message' => "gagal",
                    // 'prev_url' => route('formAddCompanies'),
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                // "data" => $dataRegis,
                "message" => $e->getMessage(),
            ]);
        }
    }
   
    public function addAdminb2b(Request $request)
    {
        $rq = $request->all();
    
        try{

            $insert = [
                'name' => $rq['name_to'],
                'username' => $rq['username_to'],
                'email' => $rq['email_to'],
                'phone' => $rq['phone_to'],
                'password' => $rq['password_to'],
                'password_confirmation' => $rq['password_confirmation_to'],
                'type' => "web",
                'acc_type' => "b2b",
            ];
    
            $response = Http::post('https://jakarta.wednesday.my.id/api/user/register', $insert);
            $konvert = json_decode($response->body());
            // $tes = $rq['get_token_to'][0];
            // print_r($konvert);
            // return view('tes',['tes'=>$konvert->success]);

            if (isset($konvert->success)) {

                    return response()->json([
                        'success' => true,
                        'message' => "success",
                        // 'prev_url' => route('companies'),
                    ]);
               
             
            }else{
                // return redirect()->back()->with('fail', "register gagal");
                return response()->json([
                    'success' => false,
                    'data'=> $konvert,
                    'message' => "Failed",
                    // 'prev_url' => route('formAddCompanies'),
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                // "data" => $dataRegis,
                "message" => $e->getMessage(),
            ]);
        }
    }


    public function addSaveOffice(Request $request)
    {
        $rq = $request->all();
    
        try{

            $insert = [
                'name' => $rq['name_to'],
                'username' => $rq['username_to'],
                'email' => $rq['email_to'],
                'phone' => $rq['phone_to'],
                'password' => $rq['password_to'],
                'password_confirmation' => $rq['password_confirmation_to'],
                'type' => "web",
                'acc_type' => "b2c",
            ];
    
            $response = Http::post('https://jakarta.wednesday.my.id/api/user/register', $insert);
            $konvert = json_decode($response->body());
            // $tes = $rq['get_token_to'][0];
            // print_r($konvert);
            // return view('tes',['tes'=>$konvert->success]);

            if (isset($konvert->success)) {

                    return response()->json([
                        'success' => true,
                        'message' => "success",
                        // 'prev_url' => route('companies'),
                    ]);
               
             
            }else{
                // return redirect()->back()->with('fail', "register gagal");
                return response()->json([
                    'success' => false,
                    'data'=> $konvert,
                    'message' => "Failed",
                    // 'prev_url' => route('formAddCompanies'),
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                "success" => false,
                // "data" => $dataRegis,
                "message" => $e->getMessage(),
            ]);
        }
    }
    public function getLocalStorage()
    {

        echo "<script>";
        echo "$(document).ready(function() {localStorage.getItem('data_token')  })";
        echo "</script>";

    }
}
