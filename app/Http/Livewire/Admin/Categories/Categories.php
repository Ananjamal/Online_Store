<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\User;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    public $search = '';
    public $category_id;

    protected $listeners = [
        'search' => 'search',
        'flash' => 'flash',
        'refreshPage' => 'mount',
    ];



    public function addCategoryModal()
    {
    }
    public function edit_category($id)
    {
        $this->category_id = $id;
    }
    public function delete_category($id)
    {
        $this->category_id = $id;
    }
    public function refresh()
    {
        $this->mount();
    }
    // #[On('search')]
    public function search($search)
    {
        $this->search = $search;
    }
    // #[On('flash')]
    public function flash($message)
    {
        session()->flash('message', $message);
    }
    // #[On('refreshPage')]
    public function mount()
    {
        // $this->categories = Category::latest()->get();
        $this->category_id = null;
    }

    public function render()
    {
        $categories = Category::where('name', 'like', "%{$this->search}%")->paginate(10);
        return view('livewire.admin.categories.categories', [
            'categories' => $categories,
        ])->layout('layout.admin.app');
    }
}
