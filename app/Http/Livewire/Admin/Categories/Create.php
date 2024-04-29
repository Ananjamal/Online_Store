<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;


class Create extends Component
{
    use WithFileUploads;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:3',
        'image' => 'required',
    ];
    public $name;
    public $image;
    public $description;

    public function store()
    {
        sleep(1);
        $validatedData = $this->validate();
        if ($this->image) {
            $validatedData['image'] = $this->image->store('public/categories');
        }
        $category = Category::create($validatedData);
        $this->reset(['name', 'description', 'image']);
        $message ="category successfully created.";
        $this->emit('flash',$message);
        $this->emit('refreshPage');
    }
    public function refresh(){
        $this->emit('refreshPage');
    }


    public function render()
    {
        return view('livewire.admin.categories.create');
    }
}
