<?php
namespace App\Http\Traits;

trait Responser {
    
    public function jsonDecoder($data) {
        return json_decode($data);
    }

    public function toJson($msg, $data, $code){
        return response()->json([
            'message' => $msg,
            'data' => $data,
            'code' => $code
        ]);
    }

}