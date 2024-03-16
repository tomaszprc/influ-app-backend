<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTypes\ApiType;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Influencer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request) {

        $company = Company::where('email', $request->email)->first();
        $influencer = Influencer::where('email', $request->email)->first();

        $user = $company ? $company: $influencer;
        
        if(!$user) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        } 
   
        if(!Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out sucessfully'
        ]);
    }
}
