<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Library\GeneratePagesListAndGroup;
use App\Models\Companies;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Request $request)
    // {
    //     $this->middleware('auth:sanctum', [
    //         'except' => [
    //             'index',
    //             'login',
    //             'logout',
    //             'registerform',
    //             'register',
    //         ],
    //     ]);
    // }

    /**
     * Login Index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.index');
    }

    public function loginAdmin()
    {
        return view('login.admin.index');
    }

    public function registerform()
    {
        
        return view('login.register');
    }

    public function register(Request $request)
    {
        $rq = $request->all();
        // try{

            $insert = [
                'name' => $rq['reg_name'],
                'username' => $rq['reg_username'],
                'email' => $rq['reg_email'],
                'phone' => $rq['reg_phone'],
                'password' => $rq['reg_password'],
                'password_confirmation' => $rq['reg_password2'],
                'type' => "web",
                'acc_type' => "b2c",
                'terms_n_cons_agreement' => $rq['reg_terms']
            ];
            // print_r($insert);

            $response = Http::post('https://app.gowisata.co.id/api/user/register', $insert);
            $konvert = json_decode($response->body());

            if (isset($konvert->success)) {
                if($konvert->success == true){
                    return response()->json([
                        'success' => true,
                        'message' => "Anda Berhasil Register",
                        'prev_url' => route('login'),
                    ]);
                }else{
                    return response()->json([
                        'success' => false,
                        'message' => "Silakan Cek Kembali data anda",
                        'data' => $konvert,
                    ]);
                }
            }else{
                return response()->json([
                    'success' => false,
                    'message' => "Silakan Cek Kembali data anda",
                    'data' => $konvert,
                ]);
            }
        // } catch (\Exception $e) {
        //     return response()->json([
        //         "success" => false,
        //         "message" => $e->getMessage(),
        //     ]);
        // }
    }

    public function login(Request $request)
    {  
        $rq = $request->all();

        $insert = [
            'login' => $rq["emailLogin"],
            'password' => $rq["passwordLogin"],
            'type' => "web",
            'acc_type' => $rq["acc_type"],
            // 'acc_type' => "approval",
        ];
        // print_r($insert);
        // return view('tes',['tes'=>$insert]);
        $response = Http::post('https://app.gowisata.co.id/api/user/login', $insert);
        print_r($response);
        $login = json_decode($response->body());
        print_r(json_encode($login));
        print_r($login->data->access_token);
        $getuser = Http::withHeaders([
            'Authorization' => 'bearer '.$login->data->access_token,
        ])->get('https://app.gowisata.co.id/api/user/user-profile');

        $profile= json_decode($getuser->body());
        // print_r(json_encode($profile));
        if ($login->success == true ) {
                if($login->data->acc_type == $profile->data->acc_type){
                    if($profile->data->acc_type == "admin"){
                        $user = $profile->data->name;
                        $acc_type = $profile->data->acc_type;
                        $token = $login->data->access_token;
                        $phone = $profile->data->phone ;
                        // $testStore = $this->storeLocalStorage($token, $user, $acc_type);
                        // return '<script>alert("ooii");</script>';
                       
                        return response()->json([
                            'success' => true,
                            'user_auth'=> $profile->data->name,
                            'user_email'=> $profile->data->email,
                            'user_phone'=> $phone,
                            'acc_type'=> $profile->data->acc_type,
                            'data' => [
                                "access_token" => $login->data->access_token,
                                "type" => "Bearer",
                            ],
                            'prev_url' =>  route('dashboard_index'),
                        ]);

                    } else if ($profile->data->acc_type == "b2b" || $profile->data->acc_type == "b2c"){
                            $id_approval = $profile->data->id;
                            // $getapproval = Companies::where("approver_id", $id_approval)->first();
                            // dd($getapproval); 

                        if($profile->data->role_id != null){
                            if($profile->data->role_id == 2){
                                $user = $profile->data->name ;
                                $email = $profile->data->email ;
                                $acc_type = $profile->data->acc_type ;
                                $token = $login->data->access_token ;
                                $phone = $profile->data->phone ;
                                return response()->json([
                                    'success' => true,
                                    'user_auth'=> $user,
                                    'user_email'=> $email,
                                    'user_phone'=> $phone,
                                    'acc_type'=> $acc_type,
                                    'company_id'=> $profile->data->company_id,
                                    'is_approval'=> $profile->data->role_id,
                                    'data' => [
                                        "access_token" => $token,
                                        "type" => "Bearer",
                                    ],
                                    'prev_url' =>  route('home'),
                                ]);

                            }elseif($profile->data->role_id == 3 ){
                                $user = $profile->data->name ;
                                $email = $profile->data->email ;
                                $acc_type = $profile->data->acc_type ;
                                $token = $login->data->access_token ;
                                $phone = $profile->data->phone;
                                return response()->json([
                                    'success' => true,
                                    'user_auth'=> $user,
                                    'user_email'=> $email,
                                    'user_phone'=> $phone,
                                    'acc_type'=> $acc_type,
                                    'company_id'=> $profile->data->company_id,
                                    'is_approval'=> $profile->data->role_id,
                                    'data' => [
                                        "access_token" => $token,
                                        "type" => "Bearer",
                                    ],
                                    'prev_url' =>  route('listorder'),
                                ]);

                            }elseif($profile->data->role_id == 4){
                                $user = $profile->data->name ;
                                $email = $profile->data->email ;
                                $acc_type = $profile->data->acc_type ;
                                $token = $login->data->access_token ;
                                $phone = $profile->data->phone;
                                return response()->json([
                                    'success' => true,
                                    'user_auth'=> $user,
                                    'user_email'=> $email,
                                    'user_phone'=> $phone,
                                    'acc_type'=> $acc_type,
                                    'company_id'=> $profile->data->company_id,
                                    'is_approval'=> $profile->data->role_id,
                                    'data' => [
                                        "access_token" => $token,
                                        "type" => "Bearer",
                                    ],
                                    'prev_url' =>  route('home'),
                                ]);
                            }else{
                                $user = $profile->data->name ;
                                $email = $profile->data->email ;
                                $acc_type = $profile->data->acc_type ;
                                $token = $login->data->access_token ;
                                $phone = $profile->data->phone ;
                                return response()->json([
                                    'success' => true,
                                    'user_auth'=> $user,
                                    'user_email'=> $email,
                                    'user_phone'=> $phone,
                                    'acc_type'=> $acc_type,
                                    'is_approval'=> $profile->data->role_id,
                                    'data' => [
                                        "access_token" => $token,
                                        "type" => "Bearer",
                                    ],
                                    'prev_url' =>  route('home'),
                                ]);
                            }
                              

                        }else{

                            $user = $profile->data->name ;
                            $email = $profile->data->email ;
                            $phone = $profile->data->phone ;
                            $acc_type = $profile->data->acc_type ;
                            $token = $login->data->access_token;
                           
                            return response()->json([
                                'success' => true,
                                'user_auth'=> $user,
                                'user_email'=> $email,
                                'user_phone'=> $phone,
                                'acc_type'=> $acc_type,
                                'data' => [
                                    "access_token" => $token,
                                    "type" => "Bearer",
                                ],
                                'prev_url' =>  route('home'),
                            ]);
                        }
                    }
                    
                }else {
                    return response()->json([
                        "success" => false,
                        "message" => "Type pengguna tidak sesuai, silakan cek kembali!"
                    ]);
                }    
        }else {
            return response()->json([
                "success" => false,
                "message" => "Password dan email kamu tidak benar!"
            ]);
        }
    }

    public function indexChangePassword(){

        return view('login.password.change_password');

    }

    public function forgetPassword(Request $request){
        $rq = $request->all();
        $insert = [
            'old_password' => $rq['password_old'],
            'password' => $rq['password_new'],
            'password_confirmation' => $rq['password_new_confirm'],
        ];

        $response = Http::post('https://app.gowisata.co.id/api/user/changePassword', $insert);
        $konvert = json_decode($response->body());
     
        if (isset($konvert->success)) {
            if($konvert->success == true){
                return response()->json([
                    'success' => true,
                    'message' => "Anda Berhasil Ubah Password",
                    'prev_url' => route('login'),
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => "Silakan Cek Kembali Password dan confirm Password",
                    'data' => $konvert,
                    'prev_url' =>  route('indexChangePassword'),
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => "Gagal Ubang Password",
                'data' => $konvert,
                'prev_url' =>  route('indexChangePassword'),
            ]);
        }
        
    }
    
    public function logout(Request $request)
    {
        return response()->json([
            'success' => true,
            'prev_url' => route('/'),
        ]);
    }

    public function storeLocalStorage($data, $user_auth, $acc_type)
    {
        return '<script>
        $(document).ready(function() {
            localStorage.setItem("data_token", JSON.stringify('.$data.') )
            localStorage.setItem("name_auth", JSON.stringify('.$user_auth.') )
            localStorage.setItem("user_type", JSON.stringify('.$acc_type.') )
        })
        </script>';
    }

    public function clearLocalStorage()
    {
        return '<script type="text/javascript">
        localStorage.clearAll();
         </script>';
    }
}
