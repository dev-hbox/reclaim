<?php

namespace App\Services;

class ResponseService
{
    /**
     * Standardized success response
     *
     * @param string|null $message
     * @param mixed $data
     * @param array $customData
     * @param int|null $code
     * @param array $meta
     * @return \Illuminate\Http\JsonResponse
     */


    public static function validationError(string $message = 'Error Occurred', $data = null)
    {
        // 422 is the standard HTTP status code for validation errors
        self::errorResponse($message, $data, 422);
    }


    public static function successResponse(string|null $message = "Success", $data = null, array $customData = [], int $code = 200): void
    {
        $response = array_merge([
            'error'   => false,
            'message' => $message ? trans($message) : '',
            'data'    => $data,
            'code'    => $code,
        ], $customData);

        response()->json($response, $code)->send();
        exit();
    }

    /**
     * Standardized error response
     *
     * @param string $message
     * @param mixed $data
     * @param string|int|null $code
     * @param \Exception|null $e
     * @param array $meta
     * @return \Illuminate\Http\JsonResponse
     */
    public static function errorResponse(string $message = 'Error Occurred', $data = null, int $code = 422, \Throwable $e = null): void
    {
        $response = [
            'error'   => true,
            'message' => $message ? trans($message) : '',
            'data'    => $data,
            'code'    => $code,
        ];

        if ($e instanceof \Throwable) {
            $response['details'] = $e->getMessage() . ' --> ' . $e->getFile() . ' At Line : ' . $e->getLine();
        }

        response()->json($response, $code)->send();
        exit();
    }
}
