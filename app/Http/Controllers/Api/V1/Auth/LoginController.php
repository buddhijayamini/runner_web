<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\User;
use App\Http\Controllers\APIController;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends APIController
{
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return $this->responseUnauthorized();
        }

        $user = auth()->user();

            return response()->json([
            'status' => 200,
            'message' => 'Authorized.',
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => array(
                'id' => $user->id,
                'name' => $user->name,
                'email'=> $user->email
            )
        ], 200);

    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully logged out.'
        ], 200);
       
    }
}
