<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
    	$this->Dangnhap();
    }

    function Dangnhap ()
    {
    	if (Auth::check()) {
            $hoa = Auth::user();
    		Session::put('hoalogin',$hoa['fullname']);
            Session::put('hoa_login',$hoa['id']);
            Session::put('hoa_avatar',$hoa['avatar']);
    	}
    }
}

