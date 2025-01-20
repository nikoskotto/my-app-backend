<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    public function register(Request $request) {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json(['message' => 'Nuovo account creato','token' => $token, 'user' => $user], 201);
    }
}
