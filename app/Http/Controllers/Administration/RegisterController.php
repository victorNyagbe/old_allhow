<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registrationForm() {
        return view('administrations.register');
    }

    public function register(Request $request) {
        
    }
}
