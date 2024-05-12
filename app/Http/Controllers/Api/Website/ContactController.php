<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\User;
use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class ContactController extends Controller
{
    use ApiResponseTrait;
    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }
        $userId = Auth::id();
        $user = User::find($userId);

        $message = Contacts::create([
            'user_id' =>$user->id,
            'name' => $request->name,
            'email' => $request->email,
            'subject' =>$request->subject,
            'message' =>$request->message,
        ]);
        return $this->ApiResponse($message, 'Message Sent Successfully', 200);
    }
}
