<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    use ResponseTrait;

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $user = User::user($request->email)->first();

        return $this->validResponseWithData([
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken
        ]);
    }
}
