<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Lang;

class LoginController extends Controller
{
    /**
     * Login Into The App
     * we need to replace later to convert,
     * it to jwt token for more security
     * @param  App\Http\Requests\Auth\LoginRequest  $request
     * @return Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            $user->ApiTokenGenerater();
            $user = $user->only(['name', 'email', 'api_token']);
            return response()->json([
                'message' => Lang::get('auth.success'),
                'errors' => [],
                'user' => $user,
            ], 200);
        } else {
            return response()->json([
                'message' => [],
                'errors' => [Lang::get('auth.failed')],
                'user' => [],
            ], 200);
        }
    }
}
