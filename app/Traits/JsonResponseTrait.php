<?php

namespace App\Traits;

trait JsonResponseTrait
{

    public function sendSuccessResponse($data, $message = 'Request was successful', $status = 200)
    {
        return response()->json([
            'data' => $data,
            'success' => true,
            'message' => $message,
        ], $status);
    }

    /**
     * Return an error response.
     *
     * @param string $error
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendErrorResponse($error, $status = 400)
    {
        return response()->json([
            'error' => $error,
            'success' => false,
        ], $status);
    }
}
