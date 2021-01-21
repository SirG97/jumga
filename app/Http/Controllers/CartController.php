<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public $sortedCart = '';
    protected static $isItemInCart = false;

    public function removeItem(Request $request){
        if(count(session()->get('cart')) <= 1){
            // Empty cart

            session()->forget('cart');
        }else{
            // Empty particular item
            $index = (int)$request->index;
            session()->forget("cart.{$index}");

            //Assign the cart value to a variable so that it can be sorted
            $s = session('cart');
            sort($s);
            // Empty the cart and save
            session()->forget('cart');

            // Then put back the sorted cart into the session again
            session()->put('cart', $s);
            session()->save();
            dd(session('cart'), session("cart.{$request->index}"), $request->index);
        }
    }

    public function addItem(Request $request){

        if(!$request->product_id){
            return response()->json(['error' => 'Malicious Activity']);
        }
        $index = 0;
        if(!session('cart') || count(session('cart')) < 1){
            session()->put('cart', [
                ['product_id' => $request->product_id, 'quantity' => 1, 'merchant_id' => $request->merchant_id]
            ]);
        }else{
            foreach (session('cart') as  $cartItems){
                //                $index++;
                foreach($cartItems as $key => $value){
                    //  If Item already exist, remove and update
                    if($key === 'product_id' and $value === $request->product_id){
                        session(["cart.{$index}.quantity" => $cartItems['quantity'] + 1]);
                        self::$isItemInCart = true;
                    }
                }
                $index++;
            }
            if(!self::$isItemInCart){
                session()->push('cart', [
                    'product_id' => $request->product_id, 'quantity' => 1, 'merchant_id' => $request->merchant_id
                ]);

            }

        }

        return response()->json(['success' => 'product added successfully']);

    }

    public function getCartItems(Request $request){

        $result = array();
        $sortedCart = array();
        $cartTotal = 0;
        if(!session()->has('cart') || count(session()->get('cart')) < 1){
            return response()->json(['error' => 'Cart is empty', 'authenticated' => Auth::check()]);
        }

        $index = 0;
        $merchant_id = '';
        $delivery_fee = 120;
        $totalQuantity = 0;
        foreach(session('cart') as $cartItem){
            $product_id = $cartItem['product_id'];
            $quantity = $cartItem['quantity'];
            $item = Product::where('product_id', $product_id)->first();

            if(!$item){ continue; }

            $totalQuantity = $totalQuantity + $quantity;
            $totalPrice = (int)$item->unit_price * $quantity;

            if (array_key_exists($item->merchant_id, $sortedCart)) {

                $sortedCart[$item->merchant_id]['total'] =  (int)$sortedCart[$item->merchant_id]['total'] + $totalPrice;
                $sortedCart[$item->merchant_id]['quantity'] =  (int)$sortedCart[$item->merchant_id]['quantity'] + $quantity;
            }else{
                $sortedCart["$item->merchant_id"] = array(
                    'merchant_id' =>$item->merchant_id,
                    'quantity' => $quantity,
                    'total' => $totalPrice
                );
            }
            $cartTotal = $totalPrice + $cartTotal;
            $totalPrice = number_format($totalPrice, 2);

            array_push($result, [
                'product_id' => $item->product_id,
                'merchant_id' => $item->merchant_id,
                'name' => $item->name,
                'image' => $item->image,
                'unit_price' => $item->unit_price,
                'quantity' => $quantity,
                'total' => $totalPrice,
                'index' => $index
            ]);
            $index++;
        }
//        $sortedCart = $this->sortAccordingToMerchant($result, 'merchant_id');
        $rawTotal = $cartTotal;
        $cartTotal = number_format($cartTotal, 2);
//        $delivery_fee = 120 * count(session('cart'));
        $grandTotal = number_format(((int)$rawTotal + (int)$delivery_fee), 2);
        $rawTotal = (int)$rawTotal + (int)$delivery_fee;
        session()->put('sorted', $sortedCart);
        return response()->json(['items' => $result,
            'grandTotal' => $grandTotal,
            'rawTotal' => $rawTotal,
            'cartTotal' => $cartTotal,
            'delivery_fee' => $delivery_fee * $totalQuantity,
            'totalQuantity' => $totalQuantity,
            'authenticated' => Auth::check(),
            'sorted' => $sortedCart
        ]);


    }

    public function updateQuantity(Request $request)
    {
        if (!$request->product_id) {
            return response()->json(['error' => 'Malicious Activity']);
        }
        $index = 0;
        $quantity = '';
        foreach (session('cart') as $cart_item) {
//                $index++;
            foreach ($cart_item as $key => $value) {
                if ($key == 'product_id' and $value == $request->product_id) {
//                        dd(session("cart.{$index}"));
                    switch ($request->operator) {
                        case '+':
                            $quantity = $cart_item['quantity'] + 1;
                            session(["cart.{$index}.quantity" => $quantity]);
                            break;
                        case '-':
                            $quantity = $cart_item['quantity'] - 1;
                            if ($quantity < 1) {
                                $quantity = 1;
                            }
                            session(["cart.{$index}.quantity" => $quantity]);
                            break;
                    }


                }

            }
            $index++;
        }
        return response()->json(['success' => 'Cart updated successfully']);
    }

    public function review(){
        return view('checkout');
    }

    public function checkout(Request $request){

        $requestPayload = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'tx_ref' => uniqid() . time(),
            'phone_number' => $request->phone_number,
            'fullname' => Auth::user()->name,
            "customer" => [
                'email'=> Auth::user()->email,
                'name'=> Auth::user()->name,
            ]
        ];


        if($request->type === 'card' or $request->type === '' or $request->type == null){
            return $this->standardCheckout($requestPayload, $request);
        }elseif($request->type === 'debit_uk_account'){
            $this->debitUKAccount();
        }elseif($request->type === 'mpesa'){
            $this->mpesa();
        }elseif($request->type === 'mobile_money_ghana'){
            $this->mobileMoneyGhana();
        }

        //  generate unique reference for the transaction.


    }

    public function debitUKAccount(){

    }
    public function mpesa(){

    }
    public function mobileMoneyGhana(){

    }

    public function standardCheckout($requestPayload, $request){
        $curl = curl_init();
        // get your public key from the dashboard.
        $requestPayload['amount'] = $request->total;
        $requestPayload['currency'] = 'NGN';
        $requestPayload['payment_options'] = "card,ussd,barter,mpesa,mobilemoneyghana";


        //Arrange the merchants and their corresponding riders to be paid and the amount for each person
        $requestPayload['subaccounts'] = $this->arrangeSubAccounts();


        $redirect_url = "http://localhost:8000/verify/"; //  redirect URL after payment
        $requestPayload['redirect_url'] = $redirect_url;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($requestPayload),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer FLWSECK_TEST-fd302c0437ac8c3dc58f5820d21182f7-X"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            dd($err);
            // there was an error contacting the rave API
            return back()->with('error', 'Curl returned error: ' . $err);
        }

        $transaction = json_decode($response);
        if($transaction->status !== 'success'){
            dd($transaction);
            // there was an error from the API
            return back()->with('error', 'API returned error: ' . $transaction->message);
        }
//dd($transaction);
        // redirect to page so User can pay

        return redirect( $transaction->data->link);
    }

    public function arrangeSubAccounts(){
        // Get the array of merchant to be sorted and price due each merchant
        $subAccounts = [];
        $sortedAccount = session('sorted');

        foreach($sortedAccount as $item => $value) {

            $merchant = Merchant::where('merchant_id', $value['merchant_id'])->with('rider')->first();
            if($merchant !== null){
                $merchantDetails = ['id' => $merchant->subaccount_id,
                                    'transaction_charge' => $value['total'] - ((2.5 * $value['total']) / 100),
                                    'transaction_charge_type' => 'flat_subaccount'];
                $charge = $value['quantity'] * 120;
                $riderDetails = ['id' => $merchant->rider->subaccount_id,
                                    'transaction_charge' => $charge - ((25 * $charge) / 100),
                                    'transaction_charge_type' => 'flat_subaccount'];
                $subAccounts[] = $merchantDetails;
                $subAccounts[] = $riderDetails;
            }
        }

        return $subAccounts;
    }


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
                "Authorization: Bearer FLWSECK_TEST-fd302c0437ac8c3dc58f5820d21182f7-X"
            ),
        ));
        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);
//        $payment = Payment::where('tx_ref', $tx_ref)->first();

//        dd($response, $response->status, $payment);
        if($response->status === 'success'){
            return back()->with('success', ' payment successful. You will recieve your order soon');

        }

        return redirect('/merchant/approve')->with('error', 'Payment can not be verified, contact admin or try again');
    }

    public function sortAccordingToMerchant($input_array, $key, $remove_key = false, $flatten_output = false){
        $output_array = [];
        foreach ($input_array as $array) {
            if ($flatten_output) {
                $output_array[$array[$key]] = $array;
                if ($remove_key) {
                    unset($output_array[$array[$key]][$key]);
                }
            } else {
                $output_array[$array[$key]][] = $array;
                if ($remove_key) {
                    unset($output_array[$array[$key]][0][$key]);
                }
            }
        }
        return $output_array;

    }
    public function resolveLater(){
        //Sort the cart according to the number of merchants
        $result = array();
        $cartTotal = 0;
        $index = 0;
        $merchant_id = '';
        $delivery_fee = 120;
        $totalQuantity = 0;
        foreach(session('cart') as $cartItem){
            $product_id = $cartItem['product_id'];
            $quantity = $cartItem['quantity'];
            $item = Product::where('product_id', $product_id)->first();
            if(!$item){ continue; }
            $totalQuantity = $totalQuantity + $quantity;
            $totalPrice = (int)$item->unit_price * $quantity;
            $cartTotal = $totalPrice + $cartTotal;

            array_push($result, [
                'product_id' => $item->product_id,
                'merchant_id' => $item->merchant_id,
                'unit_price' => $item->unit_price,
                'quantity' => $quantity,
                'total' => $totalPrice,
            ]);
            $index++;
        }
        $sortedCart = $this->sortAccordingToMerchant($result, 'merchant_id');
        $rawTotal = $cartTotal;

        $rawTotal = (int)$rawTotal + (int)$delivery_fee;

    }
}
