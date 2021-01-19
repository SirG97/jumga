<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use Illuminate\Http\Request;

class RiderController extends Controller
{

    public function showRiderForm(){
        return view('admin.addrider');
    }

    public function getBanksFromRiderCountry(Request $request){
        $curl = curl_init();
        $country = '';
        if($request->country == 'NGN'){
            $country = 'NG';
        }elseif ($request->country == 'KES'){
            $country = 'KE';
        } elseif ($request->country == 'GHS'){
            $country = 'GH';
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/banks/{$country}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer FLWSECK_TEST-fd302c0437ac8c3dc58f5820d21182f7-X"
            ),
        ));

        $banks = curl_exec($curl);
        $response = json_decode($banks);

        //Sort banks in alphabetical order
        usort($response->data, function($a, $b){ return strcmp($a->name, $b->name); });

        // $account = AccountDetail::where('vendor_id', Auth::guard('vendor')->user()->vendor_id)->first();
        curl_close($curl);

        return response()->json($response);
    }


    public function  createAccount(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|min:2|max:100',
            'phone' => 'required|numeric',
            'country' => 'required|min:2|max:3',
            'bank' => 'required|',
            'account_number' => 'required|numeric|min:1',
            'account_name' => 'required',

        ]);
        $country = '';
        if($request->country == 'NGN'){
            $country = 'NG';
        }elseif ($request->country == 'KES'){
            $country = 'KE';
        } elseif ($request->country == 'GHS'){
            $country = 'GH';
        }

        $data = array(
            "account_bank" => $request->bank,
            "account_number" => $request->account_number,
            "business_name" => $request->name,
            "business_mobile" => $request->phone,
            "business_email" => $request->email,
            "country" => $country,
            "split_value" => 0.25,
            "split_type" => "percentage"

        );

        $data = json_encode($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/subaccounts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-fd302c0437ac8c3dc58f5820d21182f7-X"
            ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        if($response->status == 'success'){
            Rider::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $country,
                    'rider_id' => uniqid(),
                    'account_id' => $response->data->id,
                    'subaccount_id' => $response->data->subaccount_id,
                    'account_number' => $response->data->account_number,
                    'account_name' => $request->account_name,
                    'bank_code' => $response->data->account_bank,
                ]);

            return back()->with('success', $response->message . ' successfully');
        }else{

            return back()->with('error', $response->message);
        }

    }


    public function resolveAccountNumber(Request $request){
        $data = array(
            "account_number" => $request->account_number,
            "account_bank" => $request->bank,
        );
        $data = json_encode($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/accounts/resolve",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-fd302c0437ac8c3dc58f5820d21182f7-X"
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);

        curl_close($curl);

        return response()->json($response);
//        dd($response);
    }
}
