<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public $product_id;
    public $product;
    public function mount($id){
        $this->product_id = $id;
        $this->product = Product::findOrFail($this->product_id);
    }
    public function destroyProduct(){
        Product::find($this->product_id)->delete();
        Storage::delete($this->product->image);
        $message ="Product Successfully Deleted.";
        $this->emit('flash',$message);
        $this->emit('refreshPage');
    }
    public function refresh(){
        $this->emit('refreshPage');
    }
    public function render()
    {
        return view('livewire.admin.products.delete');
    }
}
