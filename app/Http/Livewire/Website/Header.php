<?php

namespace App\Http\Livewire\Website;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Favorite;
use Livewire\Attributes\On;

class Header extends Component
{
    public $countCart;
    public $countFavorites;
    protected $listeners = [
        'refreshcount' => 'refreshCount',
    ];
    // #[On('refreshcount')]
    public function refreshCount()
    {
        $this->mount();
    }
    public function mount()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $userId = $user->id;
            $this->countCart = Cart::where('user_id', $userId)->get()->count();
            $this->countFavorites = Favorite::where('user_id', $userId)->get()->count();
        } else {
            $deviceId = session()->getId();
            $userId = $deviceId;
            $this->countCart = Cart::where('device_id', $userId)->get()->count();
            $this->countFavorites = Favorite::where('device_id', $userId)->get()->count();
        }
    }
    public function render()
    {
        return view('livewire.website.header')->layout('layout.website.app');
    }
}
