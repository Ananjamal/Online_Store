<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class FavoriteController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->ApiResponse(null, 'User Not Found', 401);
        }
        $favorites = Favorite::where('user_id', $id)->get();

        if ($favorites->isEmpty()) {
            return $this->ApiResponse(null, 'No favorites found', 401);
        }
        return $this->ApiResponse($favorites, 'Favorites retrieved successfully', 200);
    }
    public function addToFavorite(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->ApiResponse(null, 'User Not Found', 404);
        }
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 400);
        }

        // Create a favorite for the user
        $favorite = $user->favorites()->create([
            'product_id' => $request->product_id,
        ]);

        if ($favorite) {
            return $this->ApiResponse($favorite, 'Product Added To Favorites Successfully', 200);
        } else {
            return $this->ApiResponse(null, 'Failed to add product to favorites', 500);
        }
    }

}
