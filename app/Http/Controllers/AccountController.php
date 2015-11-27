<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}
	
    public function home() {
		$user = \Auth::user();
		return view('account.home', compact(['user']));
	}
}
