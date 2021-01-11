<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.account');
    }

    public function getOrders()
    {
        return view('user.orders');
    }

    public function getItems()
    {
        return view('user.items');
    }

    public function getAddress()
    {
        return view('user.address');
    }

    public function notifications()
    {
        return view('user.notifications');
    }

    public function changePassword()
    {
        return view('user.changepassword');
    }

}
