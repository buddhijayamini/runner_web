<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class APIController extends Controller
{
    protected static function errorResponse(string $code, string $message, int $status = 500, array $failures = null): JsonResponse
    {
        $err = [
            'code' => $code,
            'message' => $message,
        ];

        if (! is_null($failures)) {
            $err['failures'] = $failures;
        }

        return response()->json($err, $status);
    }

    protected static function successResponse(string $message, int $status = 200): JsonResponse
    {
        $o = [
            'message' => $message,
        ];

        return response()->json($o, $status);
    }
}
