<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;


class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('merchant.auth:merchant');
    }

    public function approve() {

        return view('merchant.approval');
    }


    /*
     *  Function to get Merchant email and set amount to be paid
     *  before payment is initialized
     */

    public function proceedToApprovalPayment(){
        // Create a transaction reference for the payment and get the details that will be used to initialize the payment
        $name = Auth::guard('merchant')->user()->name;
        $email = Auth::guard('merchant')->user()->email;
        $amount = 20;
        $currency = 'USD';
        $tx_ref = "rave-apprv" . uniqid();
        // Store the payment details in the DB and set status of the transaction to trending
        Payment::create([
            'email' => $email,
            'tx_ref' => $tx_ref,
            'amount' => $amount,
            'currency' => $currency,
            'payment_type' => 'n/a',
            'payment_for' => 'approval',
            'status' => 'pending'
        ]);

        // Initialize the payment
        return $this->initializeApprovalPayment($tx_ref, $name, $email, $amount, $currency);
    }

    /*
     *
     */
    public function initializeApprovalPayment($tx_ref, $name, $email, $amount, $currency){
        $curl = curl_init();

         //  generate unique reference for the transaction.
        // get your public key from the dashboard.

        $redirect_url = "http://localhost:8000/merchant/verify/"; //  redirect URL after payment

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount'=>$amount,
                'currency'=>$currency,
                'tx_ref'=>$tx_ref,
                'redirect_url'=>$redirect_url,
                "customer" => [
                    'email'=> $email,
                    'name'=> $name,
                ]
            ]),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-dde0f7d1639fee65bec4ade9497455e7-X"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the rave API
            return redirect('/merchant/approve')->with('error', 'Curl returned error: ' . $err);
        }

        $transaction = json_decode($response);
        if($transaction->status !== 'success'){
            // there was an error from the API
            return redirect('/merchant/approve')->with('error', 'API returned error: ' . $transaction->message);
        }

        // redirect to page so User can pay

        return redirect( $transaction->data->link);
    }

    /*
     *  Verify the payment with the flutterwave verification API
     */

    public function verifyApprovalPayment(Request $request){
        $curl = curl_init();
        // Retrieve the information passed to the redirect URL after payment
        $status = $request->query('status');
        $tx_ref = $request->query('tx_ref');
        $id = $request->query('transaction_id');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$id}/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-dde0f7d1639fee65bec4ade9497455e7-X"
            ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
        $payment = Payment::where('tx_ref', $tx_ref)->first();

//        dd($response, $response->status, $payment);
        if($response->status === 'success' and $response->data->tx_ref === $payment->tx_ref and
            $response->data->currency === $payment->currency and $response->data->amount === $payment->amount){

            // Mark the status of the user table as paid
            Merchant::where('merchant_id', Auth::guard('merchant')->user()->merchant_id)->update(['status' => 1]);

            // Update the payment detail in our DB
            $payment->payment_type = $response->data->payment_type;
            $payment->status = $response->status;
            $payment->save();

            return redirect('/merchant/approve')->with('success', 'Approval fee payment successful');

        }

            return redirect('/merchant/approve')->with('error', 'Payment can not be verified, contact admin or pay again');
    }
}
