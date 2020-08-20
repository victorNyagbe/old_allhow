<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm() {
        return view('administrations.login');
    }

    public function login(Request $request) {

    }
}
