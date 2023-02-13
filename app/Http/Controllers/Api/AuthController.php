<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

use Illuminate\Validation\Rules\Password;



use App\Models\PersonalAccessToken;

use Illuminate\Auth\Events\Login;

// use Laravel\Fortify\Rules\Password;
class AuthController extends Controller
{


    public function login(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns',
            'password' => ['required', 'string', Password::min(6)],
            'device_name' => 'required|string',
        ])->validate();


        $user = User::whereEmail($request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }


        if (!empty($user->two_factor_secret)) {
            return response()->json(['message' => 'Two factor authentication is required', 'user' => $user], 403);
        }
        // $user->tokens()->delete();
        $token =   $user->createToken($request->device_name);

        // if (request()->mobile_app_details && $token) {

        //     PersonalAccessToken::whereToken($token->accessToken->token)->update(['mobile_app_details' => request()->mobile_app_details]);
        // }
        event(new Login('sanctum', $user, false));
        return $this->createNewToken($token->plainTextToken, $user);
    }
    protected function createNewToken($token, $user = null)
    {

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => $user
        ];
    }
}
