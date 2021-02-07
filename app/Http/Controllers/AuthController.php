<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return response()->json([
            'success' => true,
            'user' => $user,


        ]);

    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required'
    ]);

    if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password]) ) {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $token = $user->createToken($user->email.'-'.now());

        return response()->json([
            'success' => true,
            'token' => $token->accessToken,
            'user' => $user,
        ]);
    }
}


public function try(){
    $users=User::all();
    return response()->json([
        'success' => true,
        'users' => $users,
    ]);
}
}
