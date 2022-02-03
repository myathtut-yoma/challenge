<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseTrait;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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

        if (!Hash::check($request->password, $user->password)) {
            return $this->invalidResponse('Invalid credentials', Response::HTTP_NOT_FOUND);
        }

        return $this->validResponseWithData([
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken
        ]);
    }
}
