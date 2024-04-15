<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $credentials = $request->only('email', 'password');
        //return response()->json($credentials);
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $data['name'] = $user->name;
            $data['access_token'] = $user->createToken('accessToken')->accessToken;
            return response()->json(['message' => 'Login Success', 'data' => $data], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->token()->revoke();
        if (auth()->user()->token()->delete()) {
            return response()->json(['message' => 'Logout Success'], 200);
        }
    }

    //register
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['message' => 'User created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User Registration Failed'], 401);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json(['data' => $user], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }
}
