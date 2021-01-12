<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('merchant.auth:merchant');
    }

    public function inventory() {
        return view('merchant.inventory');
    }

    public function sales() {
        return view('merchant.sales');
    }

    public function addProduct() {
        return view('merchant.addproduct');
    }
}
