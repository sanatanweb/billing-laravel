<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {    
            $request->validate([
                'email' => 'email|required',
                'password' => 'required']
            );    
            
            $credentials = request(['email', 'password']); 
            
            if (!Auth::attempt($credentials)) {      
                return response(['message' => 'Unauthenticated'],401);    
            }    
            
            $user = User::where('email', $request->email)->first();    
            
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');    
            }    
            
            // Creating plaintext token from Sanctum
            $tokenResult = $user->createToken('authToken')->plainTextToken;    
            return response()->json(['status_code' => 200, 'access_token' => $tokenResult, 'token_type' => 'Bearer',]);  
        } catch (Exception $error) {    
            return response()->json(['status_code' => 500, 'message' => 'Error in Login', 'error' => $error, ]);
        }
    }

    public function logout(Request $request)
    {
        
    }

    public function deleteTokens(Request $request)
    {
        $user = User::where('email', $request->email)->first();    
        $user->tokens()->delete();
    }

}
