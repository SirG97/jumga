<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected static $isItemInCart = false;

    public function add(Request $request){
dd('We are live!');
        try{
            $index = 0;
            if(!session()->has('cart') || count(session()->get('cart')) < 1){
                session()->put('cart', [
                    0 => ['product_id' => $request->product_id, 'quantity' => 1]
                ]);
            }else{
                foreach (session()->get('cart') as  $cartItems){
                    $index++;
                    foreach($cartItems as $key => $value){
                        //  If Item already exist, remove and update
                        if($key === 'product_id' and $value === $request->product_id){
                            array_splice(session()->get('cart'), $index -1, 1, array(
                                [
                                    'product_id' => $request->product_id,
                                    'quantity' => $cartItems['quantity'] + 1
                                ]
                            ));
                            self::$isItemInCart = true;
                        }
                    }
                }
                if(!self::$isItemInCart){
                    array_push(session()->get('cart'), [
                        'product_id' => $request->product_id, 'quantity' => 1
                    ]);
                }

            }


        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function remove(Request $request){
        if(count(session()->get('cart')) <= 1){
            // Empty cart
//            unset($_SESSION['cart']);
            session()->forget('cart');
        }else{
            // Empty particular item
            unset($_SESSION['cart'][$request->index]);
            sort($_SESSION['cart']);
        }
    }

    public function addItem(Request $request){
//        session()->forget('cart');
//        session()->save();
        dd(session('cart'));
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
//                array_push(session()->get('cart'), [
//                    'product_id' => $request->product_id, 'quantity' => 1
//                ]);
            }

        }
//        $cartItem = Cart::add($request->product_id, $request->name, $request->unit_price, 1);

        return response()->json(['success' => 'product added successfully']);

    }

    public function getCartItems(Request $request){
//        dd(session('cart'));
        $result = array();
        $cartTotal = 0;
        if(!session()->has('cart') || count(session()->get('cart')) < 1){
            return response()->json(['error' => 'Cart is empty', 'authenticated' => Auth::check()]);

        }

        $index = 0;
        $vendor_id = '';

        foreach(session('cart') as $cartItem){
            $product_id = $cartItem['product_id'];
            $quantity = $cartItem['quantity'];
            $item = product::where('product_id', $product_id)->first();
            if(!$item){ continue; }

            $totalPrice = (int)$item->unit_price * $quantity;
            $vendor_id = $item->vendor_id;
            $cartTotal = $totalPrice + $cartTotal;
            $totalPrice = number_format($totalPrice, 2);

            array_push($result, [
                'product_id' => $item->product_id,
                'name' => $item->name,
                'image' => $item->image,
                'unit_price' => $item->unit_price,
                'quantity' => $quantity,
                'total' => $totalPrice,
                'index' => $index
            ]);
            $index++;
        }
        $rawTotal = $cartTotal;
        $cartTotal = number_format($cartTotal, 2);
        $delivery_fee = Vendor::where('vendor_id', $vendor_id)->first()->min_delivery;
        $grandTotal = number_format(((int)$rawTotal + (int)$delivery_fee), 2);
        $rawTotal = (int)$rawTotal + (int)$delivery_fee;

        return response()->json(['items' => $result,
            'grandTotal' => $grandTotal,
            'rawTotal' => $rawTotal,
            'cartTotal' => $cartTotal,
            'delivery_fee' => $delivery_fee,
            'authenticated' => Auth::check()]);

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
//                        dd(session("cart.{$index}"));
//                        $i = $index - 1;
//                        session()->push("cart.{$i}",  [
//                            'product_id' => $request->product_id,
//                            'quantity' => $quantity
//                        ]);
//                        session()->flush();
//                        dd($cart_item);
//                        dd(session()->get('cart'));
//
//                        dd(session('cart'));
//                        array_splice(session('cart'), $index -1, 1, array(
//                            [
//                                'product_id' => $request->product_id,
//                                'quantity' => $quantity
//                            ]
//                        ));

                }

            }
            $index++;
        }
    }
}
