<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller {

    protected function getAuthExceptMethods() {
        return ['login'];
    }
    
    /**
     * Login
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }

            $user = User::byEmail($credentials['email']);
            $user['token'] = $token;

            // if no errors are encountered we can return user with a valid token
            return response()->json(compact('user'));
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
    }
}
