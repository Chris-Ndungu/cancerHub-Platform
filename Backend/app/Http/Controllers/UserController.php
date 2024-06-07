<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    // Create User
    function createUser(Request $request)
    {
        //validate 
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'county' => 'required'
        ]);

        // creating the record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'county' => $request->county,
        ]); // eloquent - we dont need to type our SQL syntax here

        // override user variable to contain record from DB
        $user = User::find($user->id);

        // Generate API token
    $token = $user->createToken('auth_token');

        // return response
        if ($user) {
            return response([
                'message' => 'success',
                'user' => $user,
                'token'=>$token->plainTextToken,
                'status' => 200
            ]);
        } else {
            return response([
                'message' => 'failed',
                'user' => '...',
                'status' => 404,
            ]);
        }
    }

    // Login
    function userLogin(Request $request)
    {
        try {
            // Perform validation using $request->validate
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            // Attempt login using Laravel's built-in authentication
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Login successful
                $user = Auth::user();

                // Generate a JWT token 
                $token = $user->createToken('auth_token')->plainTextToken; // Adjust token name as needed
                return response()->json([
                    'message' => 'Login successful',
                    'user' => $user,
                    'token' => $token, // Use $compactToken instead of plainTextToken
                    'status' => 200
                ], 200);
                // You can generate a token here or handle login logic based on your needs
                return response()->json(['message' => 'Login successful'], 200);
            }

            // Login failed
            return response()->json(['message' => 'Wrong email or password.'], 401);
        } catch (ValidationException $e) {
            return response()->json($e->validator->errors(), 422);
        }
    }
}
