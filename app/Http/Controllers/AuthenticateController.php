<?php

namespace App\Http\Controllers;

use App\Services\ApiTokenCreateService;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthenticateController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        $user = User::where('email', $request->email)->first();
        $ApiTokenCreateService = new ApiTokenCreateService($user);
        return $ApiTokenCreateService->responseWithToken();
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'ログアウトしました']);
    }

    public function getCurrentUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(compact('user'));
    }
}
