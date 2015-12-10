<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller {
    
    /**
     * Login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            $user = User::byEmail($credentials['email']);

            if ($user && $token = JWTAuth::fromUser($user)) {
                $user['token'] = $token;
                return response()->json(compact('user'));
            }

            return response()->json(['error' => 'invalid_credentials'], 401);

        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

    }
}
