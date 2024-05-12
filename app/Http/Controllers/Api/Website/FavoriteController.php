<?php

namespace App\Http\Controllers\Api\Website;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class FavoriteController extends Controller
{
    use ApiResponseTrait;
    public function index(Request $request)
    {
        $userId = Auth::id(); // Retrieve the authenticated user's ID
        $favorites = Favorite::where('user_id', $userId)->get();

        if ($favorites->isEmpty()) {
            return $this->ApiResponse(null, 'No favorites found', 401);
        }
        return $this->ApiResponse($favorites, 'Favorites retrieved successfully', 200);
    }

    public function deleteFromFavorites(Request $request)
    {
        $userId = Auth::id(); // Retrieve the authenticated user's ID

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        if ($validator->fails()) {
            return $this->ApiResponse(null, $validator->errors(), 422);
        }

        $favorite = Favorite::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$favorite) {
            return $this->ApiResponse(null, 'Favorite Product Not found', 404);
        }

        $favorite->delete();
        return $this->ApiResponse($favorite, 'Product Deleted From Favorites Successfully', 200);
    }
}
