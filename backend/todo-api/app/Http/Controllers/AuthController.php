<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request){
        $cridentials = $request->validate([
            'name'=> "required|max:255",
            'email'=> "required|email|unique:users",
            'password'=> "required|confirmed"
        ]);
        $user = User::create($cridentials);
        $token = $user->createToken($request->name);
        return [
            'Natija' => "Ro'yxatdan o'tdingiz", 
            'token' => $token->plainTextToken
        ];
    }

    public function login(Request $request){
            $request->validate([
            'email'=> "required|email|exists:users",
            'password'=> "required"
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return "Ma'lumotlar xato kiritildi.";
        }
        $token = $user->createToken($user->name);
        return [
            'Natija' => "Xush kelibsiz!", 
            'token' => $token->plainTextToken
        ];
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return 'Akkountdan chiqdingiz.';
    }
}
