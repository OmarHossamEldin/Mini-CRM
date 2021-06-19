<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\AuthRepository;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    /**
     * Login Into The App
     * we need to replace later to convert,
     * it to jwt token for more security
     * @param  App\Http\Requests\Auth\LoginRequest  $request
     * @param  App\Repositories\AuthenticateRepository $authRepository
     * @return Illuminate\Http\Response
     */
    public function login(LoginRequest $request, AuthRepository $authRepository)
    {
        $response = $authRepository->authenticate($request->validated());
        
        return $response['message'] ? response()->json($response, 201) : response()->json($response, 401);
    }
}
