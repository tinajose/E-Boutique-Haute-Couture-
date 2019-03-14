<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserregisterController extends Controller
{
    public function register()
    {
        return view('user_register.user_register');
    }
    public function store(Request $request)
    {
        
    }
}
