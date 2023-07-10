<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    function index()
    {
        return view('Auth.login');
    }

    
    
    function validate_login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $user =auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            
        ],$request->password);
        if($user){
            return redirect()->route('admin.index')->with('success','Login Successfull');
        }else{
            return redirect()->back()->with('error','Invalid credentials');
        }
        
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('Auth.login')->with('success','You have been successfully logged out');
    }

   
        
    }

