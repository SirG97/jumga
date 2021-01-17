<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function viewProductsPage(){

        return view('products');
    }

    public function getProducts(){
        $products = Product::all();
        return response()->json(['status'=>'success', 'products' => $products]);
    }

    public function getProduct($id){
        return view('products');
    }

    public function viewCart(){
        return view('cart');
    }

    public function getMerchants(){
        return view('products');
    }

    public function getMerchant($id){
        return view('products');
    }
}
