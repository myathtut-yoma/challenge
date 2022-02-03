<?php

namespace App\Http\Helpers;

use Illuminate\Http\Response;

trait ResponseTrait
{
    /**
     * @param $message
     * @param null $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function invalidResponse($message, $code = null)
    {
        return response()->json([
            'status' => $code,
            'message' => $message
        ], $code);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function validResponseWithData($data)
    {
        return response()->json($data, Response::HTTP_OK);
    }
}
