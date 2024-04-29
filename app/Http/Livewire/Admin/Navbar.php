<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Contacts;
use Livewire\WithPagination;

class Navbar extends Component
{
    use WithPagination;

    public $username;
    public $user_id;
    public $msgCount;
    public $search;
    public function performSearch()
    {
        if ($this->search) {
            $input_search = $this->search;
            $this->emit('search', $input_search);
        }
    }
    public function goToMessage($id){
        $this->emit('messages',$id);
    }
    public function mount()
    {
        if (auth()->check()) {
            $this->user_id = auth()->id();
        }
        $this->username = User::find($this->user_id)->name;
        $this->msgCount = Contacts::count();
    }
    public function render()
    {
        $msg = Contacts::paginate(4);
        return view('livewire.admin.navbar', [
            'msg' => $msg,
        ]);
    }
}
