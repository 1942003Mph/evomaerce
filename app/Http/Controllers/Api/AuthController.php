<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function validate_registration(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->all()],401);
        }
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
    public function validate_login(Request $request){
    $data = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if(auth()->attempt($data)){
        $user = auth()->user();
        $token = auth()->user()->createToken('Token')->accessToken;
        $user['token'] = $token;
        return response()->json(['user' => $user], 200);
    }
    else {
        return response()->json(['error' => 'unauthorized'], 401);
    }
}

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $user = auth()->user();
        return response()->json(['user' => $user], 200);
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
