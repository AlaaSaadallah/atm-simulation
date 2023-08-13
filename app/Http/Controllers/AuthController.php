<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signin(SigninRequest $request)
    {
        $user = $request->signin();
        $token = $user->createToken($user->card_number)->accessToken;

        return response([
            'message' => __('auth.success'),
            'access_token' => $token,
            'user' => new UserResource($user),
        ]);
    }

    public function signOut()
    {
        auth('api')->user()->token()->revoke();
        return response([
            'message' => __('auth.sign_out'),
        ]);
    }

}
