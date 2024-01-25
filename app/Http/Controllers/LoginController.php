<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\SuccessResource;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Create user login
     */
    public function store(LoginRequest $request)
    {
        $remember   =   $request->has('remember');
        $user       =   User::firstWhere("email", $request->email);
        if ($remember) {
            $token      =   $user->createToken($request->email,['*'],now()->addDays(30))->plainTextToken;
        }else{
            $token      =   $user->createToken($request->email)->plainTextToken;
        }
        $user->remember_token = $token;
        return LoginResource::make($user);
    }

    /**
     * Create user logout
     */
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();

        return SuccessResource::make([]);
    }
}
