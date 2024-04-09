<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return response()->json(['success' => 'true'], 200);
        
    }

    public function logout(Request $request)
    {
        
    }

    //register
    public function register(Request $request)
    {
        
    }
}
