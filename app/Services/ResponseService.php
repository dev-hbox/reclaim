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
    public static function successResponse(string|null $message = "Success", $data = null, array $customData = [], $code = null, $meta = [])
    {
        // Default to 200 if no code provided, otherwise use the provided $code (e.g., 201 for resource creation)
        $code = $code ?? 200;

        return response()->json(array_merge([
            'success' => true,
            'message' => trans($message),
            'data'    => $data,
            'code'    => $code,
            'errors'  => null, // No errors in success response
            'meta'    => $meta // Optional metadata like pagination, etc.
        ], $customData), $code);
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
    public static function errorResponse(string $message = 'Error Occurred', $data = null, $code = null, $e = null, $meta = [])
    {
        // Default to 400 if no code provided, otherwise use the provided $code (e.g., 422 for validation errors)
        $code = $code ?? 400;

        return response()->json([
            'success' => false,
            'message' => trans($message),
            'data'    => $data,
            'code'    => $code,
            'errors'  => $e ? [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine()
            ] : null, // Include error details if exception provided
            'meta'    => $meta // Optional metadata
        ], $code);
    }
}
