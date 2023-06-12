<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class api extends Controller
{
    public function login($param1, $param2)
    {
        $data = [
            'email' => $param1,
            'password' => $param2,
        ];

        if (Auth::Attempt($data)) {
            return 1;
            // echo 'hai';
        } else {
            return 0;
        }
    }
    public function login1(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return 1;
        } else {
            return 2;
        }
    }
}
