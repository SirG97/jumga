<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function getProducts(){
        return view('products');
    }

    public function getProduct($id){
        return view('products');
    }

    public function getMerchants(){
        return view('products');
    }

    public function getMerchant($id){
        return view('products');
    }
}
