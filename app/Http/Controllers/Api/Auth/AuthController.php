<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Mobile\RegisterRequest;
use App\Models\SubmitService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {


        // Validate the email and password
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Validate credentials
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate a token
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user->name,
            'email' => $user->email,
            'id' => $user->id,
        ]);
    }
    public function register(RegisterRequest $request)
    {
        // The validation is already done by RegisterRequest

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate the API token for the user
        $token = $user->createToken('api-token')->plainTextToken;

        // Return a successful registration response with 201 status code
        return response()->json([
            'message' => 'Registration successful',
            'token' => $token,
            'user' => $user->name,
            'email' => $user->email,
            'id' => $user->id,
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout successful'], 200);
    }

    public function deleteUser()
    {
        $user = auth()->user();

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
