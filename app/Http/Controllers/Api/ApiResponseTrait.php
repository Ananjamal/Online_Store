<?php
namespace App\Http\Controllers\Api;
use App\Models\User;
trait ApiResponseTrait
{
    public function ApiResponse($date = null, $message = null, $status = null){
        $array = [
            'data' => $date,
            'message' => $message,
            'status' => $status
        ];
        return response($array,$status);

    }
}
