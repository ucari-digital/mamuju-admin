<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
    	return view('login');
    }

    public function login_action(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/'.Auth::User()->role);
        } else {
            return redirect('/login')
                ->with('info', "opps, password yang anda masukan tidak sama");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
