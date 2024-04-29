<?php

namespace App\Http\Livewire\Admin\Messages;

use Livewire\Component;
use App\Models\Contacts;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    public $msg_id;
    public $search;
    protected $listeners = [
        'search' => 'search',
    ];
    public function showMessage($id)
    {
        $msg_id =Contacts::find($id);
        $this->msg_id = $msg_id->id;
    }

    public function refresh()
    {
        $this->msg_id =null;
    }
    public function search($search)
    {
        $this->search = $search;
    }
    public function render()
    {
        $msg = Contacts::where('name', 'like', "%{$this->search}%")->paginate(10);

        return view('livewire.admin.messages.messages', [
            'msgs' => $msg,
        ])->layout('layout.admin.app');
    }
}
