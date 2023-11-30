<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function errorBadRequest($message = '', $data = [])
    {
        if (is_array($message)) {
            $tmp = array();
            foreach ($message as $key => $value) {
                if (is_array($value)) {
                    $tmp[] = $value[0];
                } else {
                    $tmp[] = $value;
                }
            }
            $message = $tmp;
        } else {
            $message = array($message);
        }

        $response = array(
            'error_code' => 400,
            'message' => $message,
            'data' => $data,
        );
        return response()->json($response, 400);
    }

    protected function successRequest($data = array())
    {
        return response()->json([
            'error_code' => 0,
            'message' => ['Successfully'],
            'data' => $data,
        ], 200);
    }
}
