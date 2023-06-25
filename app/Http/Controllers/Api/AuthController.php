<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function validate_registration(Request $request)
    {
        $user = User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request['password'])
        ]);
        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token'=>$token,'user'=>$user],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function validate_login(Request $request)
    {
        $data = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(auth()->attempt($data)){
             $token =  auth()->user->createToken('Token')->accessToken;
        return response()->json(['token'=>$token],200);

        }
        else{
        return response()->json(['error'=>'unauthorized'],401);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
