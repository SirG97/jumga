<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('merchant.auth:merchant');
    }

    public function inventory() {
        // Retrieve all product
        $products = Product::where('merchant_id', Auth::guard('merchant')->user()->merchant_id)->get();

        return view('merchant.inventory', compact('products'));
    }

    public function sales() {
        return view('merchant.sales');
    }

    public function addProduct() {
        return view('merchant.addproduct');
    }

    public function createProduct(Request $request){
        $request->validate([
            'merchant_id' => 'required',
            'category' => 'required|min:2|max:30',
            'name' => 'required|min:2|max:30',
            'unit_price' => 'required|min:2|max:30',
            'quantity' => 'required|numeric|min:1',
            'description' => 'min:5',
            'image' => 'required|file|mimes:jpg,jpeg,png',
        ]);

//        $path = $request->image->storeAs('public/products', uniqid() . time().'.'.$request->image->extension());
        $fileName = uniqid() . time().'.'.$request->image->extension();
//        //                $path = $request->file('banner')->store('banners');
        $request->image->move(public_path('img/products'), $fileName);

        //Add the user
        $details = [
            'merchant_id' => Auth::guard('merchant')->user()->merchant_id,
            'product_id' => uniqid(),
            'category' => $request->category,
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $fileName
        ];
        Product::create($details);

        return back()->with('success', 'Product added successfully');
    }
}
