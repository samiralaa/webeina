<?php
namespace App\Services\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthService
{
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }

    public function logout()
    {
        Auth::logout();
    }

    public function register(array $data)
    {
        // Example: Create a new user (adjust according to your user model)
        return User::create($data);
    }
}