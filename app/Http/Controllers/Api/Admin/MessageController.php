<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\MessageResource;
use App\Http\Controllers\Api\ApiResponseTrait;

class MessageController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $messages = MessageResource::collection(Contacts::all());
        return $this->ApiResponse($messages, 'Done', 200);
    }
    public function show(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->ApiResponse(null, 'User Not Found', 401);
        }
        $messages = Contacts::where('user_id', $id)->get();
        if ($messages->isEmpty()) {
            return $this->ApiResponse(null, 'There Are No Messages', 401);
        }
        return $this->ApiResponse(MessageResource::collection($messages), 'Done', 200);
    }
}
