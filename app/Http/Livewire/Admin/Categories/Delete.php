<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;


class Delete extends Component
{
    public $category_id;
    public $category;

    public function mount($id)
    {
        $this->category_id = $id;
        $this->category = Category::findOrFail($id);
    }


    public function destroyCategory(){
        Category::find($this->category_id)->delete();
        Storage::delete($this->category->image);
        $message ="category successfully Deleted.";
        $this->emit('flash',$message);
        $this->emit('refreshPage');

    }
    public function refresh(){
        $this->emit('refreshPage');
    }
    public function render()
    {
        return view('livewire.admin.categories.delete');
    }
}
