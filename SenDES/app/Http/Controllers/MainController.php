<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validator;
use Auth;

class MainController extends Controller
{
    function index()
    {
        return view('login');
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' =>'required|email',
            'password' =>'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/successlogin');
        }
        else
        {
            return back()->with('error', 'Incorrects details');
        }
    }
    function successlogin()
    {
        return view('welcome');
    }
    function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
