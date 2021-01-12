<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('merchant.auth:merchant');
    }

    public function approve() {
        return view('merchant.approval');
    }
}
