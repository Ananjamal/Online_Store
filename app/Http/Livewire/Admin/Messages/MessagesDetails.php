<?php

namespace App\Http\Livewire\Admin\Messages;

use Livewire\Component;
use App\Models\Contacts;

class MessagesDetails extends Component
{
    public $message_content;
    public $date;
    public function mount($id){
        $msg =Contacts::find($id);
        $this->message_content = $msg->message;
        $this->date = $msg->created_at;

    }
    public function render()
    {
        return view('livewire.admin.messages.messages-details');
    }
}
