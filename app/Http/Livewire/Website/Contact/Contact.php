<?php

namespace App\Http\Livewire\Website\Contact;

use Livewire\Component;
use App\Models\Contacts;

class Contact extends Component
{
    public $name;
    public $email;
    public $subject;
    public $msg;

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|min:3',
            'subject' => 'required|min:3',
            'msg' => 'required',
        ]);

        if (auth()->check()) {
            $user_id = auth()->id();

            $contact = new Contacts();
            $contact->user_id = $user_id; // Assign the user ID if it exists
            $contact->name = $this->name;
            $contact->email = $this->email;
            $contact->subject = $this->subject;
            $contact->message = $this->msg;
            $contact->save();
            $this->reset(['name', 'email', 'subject', 'msg']);
            session()->flash('success', 'Your Message Sent Successfully');
        } else {
            session()->flash('error', 'You have to login first!');
        }
    }

    public function render()
    {
        return view('livewire.website.contact.contact')->layout('layout.website.app');
    }
}
