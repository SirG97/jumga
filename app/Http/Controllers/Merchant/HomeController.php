<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * This controller handles the dashboard, profile and changing of password.
     * Not really necessary for the completion of the challenge
     * @return void
     */
    public function __construct()
    {
        $this->middleware('merchant.auth:merchant');
    }

    /**
     * Show the Merchant dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('merchant.home');
    }

    public function getProfile() {
        return view('merchant.profile');
    }

    public function notifications() {
        return view('merchant.notifications');
    }

    public function changePassword() {
        return view('merchant.changepassword');
    }
}
