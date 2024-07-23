<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected function sendResponse($result, $message, $type = 'success', $code = 200)
    {
        return response()->json([
            'message' => $message,
            'data' => $result,
            'type' => $type
        ], $code);
    }

    protected function sendError($error, $code = 500, $type = 'error')
    {
        return response()->json([
            'message' => $error,
            'type' => $type
        ], $code);
    }
}
