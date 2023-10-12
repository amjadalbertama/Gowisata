<?php

namespace App\Http\Controllers\Menu\Kereta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class KaiLuarbiasaController extends Controller
{
    public function chooseWagon()
    {
        return view("home.kereta.kereta_luarbiasa.index");
    }

    public function chooseContact()
    {
        return view("home.kereta.kereta_luarbiasa.list_kontak");
    }

    public function orderLuarbiasa()
    {
        return view("pages.orders.btc.luarbiasa");
    }

    public function saveContact(Request $request)
    {
        $rq = $request->all();

        $insert = [      
            "name" => $rq['name_cont'],
            "email" => $rq['email_cont'],
            "phone" => $rq['phone_cont'],
            "company_name" => $rq['company_cont'],
            "company_address" => $rq['address_cont']
        ];
        $response = Http::withHeaders([
            'Authorization' => 'bearer '.$rq['token_cont'],
        ])->post('https://jakarta.wednesday.my.id/api/train/save_contact', $insert);
      
        $contact = json_decode($response->body());
    
        if(isset($contact->success)){
            if ($contact->success == true) {
                return response()->json([
                    "success" => true,
                    "message" => $contact->success,
                ]);
            } else if($contact->success == false){
                return response()->json([
                    "success" => false,
                    "message" => $contact->message,
                ]);
            }

        }else{
            return response()->json([
                "success" => false,
                "message" => $contact,
            ]);
        }
    }
}
