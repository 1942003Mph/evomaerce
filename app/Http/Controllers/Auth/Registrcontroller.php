<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Registrcontroller extends Controller
{
    function registration()
    {
        return view('Auth.register');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        $user= User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password']),

        ]);

        Auth::login($user);
        // dd(Auth::user());
        return redirect()->route('home')->with('success','registration Successfull');
        // if(Auth::attempt($request->only('email','password'))){
        //      return redirect()->route('/')->with('success','registration Successfull');
        //     // dump(Auth::user());

        // }
        //  return redirect()->route('Auth.registration')->withErrors('errore');
        // dump(Auth::user());


    }
}
