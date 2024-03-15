<?php

if (!function_exists('_200')) {
    function _200($data = null, $status = true, $message = 'Success', $code = 200)
    {
        return response()->json([
            'status'      => $status,
            'status_code' => $code,
            'message'     => $message,
            'data'        => $data,
        ], $code);
    }
}

if (!function_exists('_400')) {
    function _400($message = 'Bad Request', $code = 400)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}

if (!function_exists('_401')) {
    function _401($message = 'Unauthorized', $code = 401)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}

if (!function_exists('_403')) {
    function _403($message = 'Forbidden', $code = 403)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}

if (!function_exists('_404')) {
    function _404($message = 'Not Found', $code = 404)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}

if (!function_exists('_406')) {
    function _406($message = 'Not Acceptable', $code = 406)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}

if (!function_exists('_500')) {
    function _500($message = 'Something went wrong. Please try again later', $code = 500)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}

if (!function_exists('_411')) {
    function _411($message = 'Update your app', $code = 411)
    {
        return response()->json([
            'status'      => false,
            'status_code' => $code,
            'message'     => $message,
            'data'        => null,
        ], $code);
    }
}