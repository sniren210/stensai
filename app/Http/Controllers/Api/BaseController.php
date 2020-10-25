<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendResponse($msg,$rs)
    {
        $res = [
            'success' => true,
            'message' => $msg,
            'data' => $rs
        ];

        return \response()->json($res,200);
    }

    public function sendError($err,$errMsg = [],$code = 404)
    {
        $res = [
            'success' => false,
            'message' => $err
        ];

        if (!empty($errMsg)) {
            $res['data'] = $errMsg;
        }

        return \response()->json($res,$code);
    }
}
