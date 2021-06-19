<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Lang;

class RegisterController extends Controller
{
    /**
     * will validating the request and create user
     * then send verification mail him if email not real will rise un error 
     * asking him to send real email
     * @param App\Http\Requests\Auth\RegisterRequest $request
     * @return Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return response()->json([
            'message' =>  Lang::get('auth.register'),
            'errors' => []
        ], 200);
    }
}
