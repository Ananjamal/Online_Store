<?php

namespace App\Http\Livewire\Website\Favorites;

use Livewire\Component;
use App\Models\Favorite;

class Favorites extends Component
{
    public $favorites;
    public function mount()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $userId = $user->id;
            $this->favorites = Favorite::where('user_id', $userId)->get();
        } else {
            $deviceId = session()->getId();

            $userId = $deviceId;
            // dd($userId);
            $this->favorites = Favorite::where('device_id', $userId)->get();
        }
    }
    public function delete_favorite_item($id)
    {
        Favorite::where('product_id', $id)->delete();
        session()->flash('success','Product Removed From Favorites Successfully');
        $this->emit('refreshcount');
        $this->mount();

    }

    public function render()
    {
        return view('livewire.website.favorites.favorites')->layout('layout.website.app');
    }
}
