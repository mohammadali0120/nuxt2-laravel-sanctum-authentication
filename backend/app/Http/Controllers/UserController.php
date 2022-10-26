<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        $user = User::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => bcrypt($attributes['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)

    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255',
        ]);


        // check email

        $user = User::where('email', $attributes['email'])->first();

        // check password

        if (!$user || !Hash::check($attributes['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }



        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function loggedInUserInfo(Request $request)
    {
        return auth()->user();
    }
    public function logout(Request $request)
    {
        $user = User::where('email', $request->email)->first();



        // $user->tokens()->where('tokenTableId', $request->token)->delete();




        // return [
        //     'message' => "User with id of $request->id has been logged out"
        // ];



        // $request->user()->tokens()->delete();

        $user->tokens()->delete();

        return [
            'message' => "User with id of $request->id has been logged out",
            'tokens' => auth('sanctum')->user()->id
        ];








        // $request->user()->currentAccessToken()->delete();

        // return [
        //     'message' => "User with id of $request->id has been logged out"
        // ];
    }
}
