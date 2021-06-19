<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Destroy the token and logout.
     * @return Illuminate\Http\Response
     */
    public function logout()
    {
        $user = auth('api')->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        }
        return response()->json([
            'message' => Lang::get('auth.logout'),
            'errors' => []
        ], 200);
    }
}
