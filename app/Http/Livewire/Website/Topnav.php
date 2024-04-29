<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class Topnav extends Component
{
    public function render()
    {
        return view('livewire.website.topnav')->layout('layout.website.app');
    }
}
