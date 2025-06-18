<?php

namespace App\traits;

trait ResponseTrait
{

    public function responseData(String $message, int  $code ,String $debugMessage="",  array| null | object $data=[] ): \Illuminate\Http\JsonResponse
    {
        return response()->json(["message" => $message,"debugMessage" => $debugMessage, "status" => $code, "data" => $data ],  $code);
    }
}
