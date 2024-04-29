<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $product_id;
    public $search = '';
    protected $listeners = [
        'search' => 'search',
        'flash' => 'flash',
        'refreshPage' => 'mount',
    ];
    // #[On('search')]
    public function search($search)
    {
        $this->search = $search;
    }
    public function addProductModal()
    {
    }
    public function edit_product($id)
    {
        $this->product_id = $id;
    }
    public function delete_product($id)
    {
        $this->product_id = $id;
    }
    // #[On('flash')]
    public function flash($message)
    {
        session()->flash('message', $message);
    }
    // #[On('refreshPage')]
    public function mount()
    {
        // $this->products = Product::all();
        $this->product_id = null;
    }
    public function refresh()
    {
        $this->mount();
    }

    public function render()
    {
        $products = Product::where('name', 'like', "%{$this->search}%")->paginate(10);
        return view('livewire.admin.products.products', [
            'products' => $products,
        ])->layout('layout.admin.app');
    }
}
