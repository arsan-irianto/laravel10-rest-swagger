<?php

if (!function_exists('get_user')) {
    function get_user($id)
    {
        return \App\Models\User::find($id)->name ?? '-';
    }
}

if (!function_exists('convert_format_tanggal')) {
    function convert_format_tanggal($value)
    {
        return (!$value) ? '' : date('d/m/Y', strtotime($value));
    }
}

if (!function_exists('getUserById')) {
    function getUserById($id)
    {
        return \App\Models\User::find($id) ?? '-';
    }
}

if (!function_exists('format_number')) {
    function format_number($value)
    {
        return number_format($value, 0, ",", ".");
    }
}

if (!function_exists('can')) {
    function can($permisssion)
    {
        return  auth()->user()->can($permisssion);
    }
}
