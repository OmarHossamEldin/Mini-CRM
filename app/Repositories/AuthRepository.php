<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    public function authenticate(array $data): array
    {
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $user->ApiTokenGenerater();
            $user = $user->only(['name', 'email', 'api_token']);
            $response = [
                'message' => 'you have been loged in successfully',
                'errors' => [],
                'user' => $user,
            ];
        } else {
            $response = [
                'message' => [],
                'errors' => 'your login credentials not matches our records',
                'user' => []
            ];
        }
        return $response;
    }
}
