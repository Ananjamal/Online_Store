<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.website.home')->layout('layout.website.app');
    }
}
