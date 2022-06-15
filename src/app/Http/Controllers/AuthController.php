<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $fields = $request->validate([
    //         'name' => 'required|string|unique',
    //         'email' => 'required|string|unique:users,email',
    //         'password' => 'required|string|confirmed'
    //     ]);

    //     $user = User::create([
    //         'name' => $fields['name'],
    //         'email' => $fields['email'],
    //         'password' => bcrypt($fields['password']),
    //         'isAdmin' => 0
    //     ]);


    //     $response = [
    //         'user' => $user
    //     ];

    //     return response($response, 201);
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($request->only('email', 'password')))
            return response()->json(['message' => 'Authentication Failed'], 500);

        $request->session()->regenerate();
        return response()->json(['message' => 'Logged in', 'name' => auth()->user()->name, 'isAdmin' => auth()->user()->isAdmin], 201);



        // // // // // // bearer auth // // // // //

        // // Check email
        // $user = User::where('email', $fields['email'])->first();

        // // Check password
        // if(!$user || !Hash::check($fields['password'], $user->password)) {
        //     return response([
        //         'message' => 'Bad creds'
        //     ], 401);
        // }

        // $token = $user->createToken('myapptoken')->plainTextToken;

        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];

        // return response($response, 201);
    }

    public function currentUser(Request $request)
    {
        return [
            'message' => auth()->user()
        ];
    }

    public function logout(Request $request)
    {
        auth("web")->logout();
        // Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'logged out', 204]);
    }
}
