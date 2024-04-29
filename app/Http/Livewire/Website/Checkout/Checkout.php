<?php

namespace App\Http\Livewire\Website\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Adresses;
use Livewire\Attributes\On;
use App\Models\OrderProduct;

class Checkout extends Component
{
    public $cartItem;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $address_line1;
    public $address_line2;
    public $country;
    public $city;
    public $state;
    public $zip_code;
    public $paymentMethod;
    public $shipping = 10;
    public $subtotal;
    public $totalprice;

    public function mount()
    {
        $this->cartItem = Cart::where('user_id', auth()->user()->id)->get();
        $this->calculateSubtotal();
        $this->calculateTotal();
    }
    public function calculateSubtotal()
    {
        $subtotal = 0;

        foreach ($this->cartItem as $item) {
            $subtotal += $item->product->price * $item->quantity;
        }

        $this->subtotal = $subtotal;
    }
    public function calculateTotal()
    {
        $this->totalprice = $this->subtotal + $this->shipping;
    }
    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'paymentMethod' => 'required',
        ]);
        // Create the order
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->shipping_price = $this->shipping;
        $order->total_price = $this->totalprice;
        $order->payment_method = $this->paymentMethod;
        $order->save();
        // Create the user address
        $userAddress = new Adresses();
        $userAddress->user_id = auth()->user()->id;
        $userAddress->order_id = $order->id;
        $userAddress->firstname = $this->firstname;
        $userAddress->lastname = $this->lastname;
        $userAddress->email = $this->email;
        $userAddress->phone = $this->phone;
        $userAddress->address_line1 = $this->address_line1;
        $userAddress->address_line2 = $this->address_line2;
        $userAddress->country = $this->country;
        $userAddress->city = $this->city;
        $userAddress->state = $this->state;
        $userAddress->zip_code = $this->zip_code;
        $userAddress->save();
        // Loop through cart items and create order products
        foreach ($this->cartItem as $cart) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $cart->product->id;
            $orderProduct->quantity = $cart->quantity; // Assuming quantity per cart item is 1
            $orderProduct->price = $cart->product->price;
            $orderProduct->total = $cart->total;
            $orderProduct->save();
        }
        $this->resetInput();
        session()->flash('success', 'Your order has been placed successfully.');
        //Clear the cart after placing the order
        Cart::where('user_id', auth()->user()->id)->delete();
        $this->emit('refreshcount');
        $this->mount();

    }
    public function resetInput()
    {
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->phone = null;
        $this->address_line1 = null;
        $this->address_line2 = null;
        $this->country = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->paymentMethod = null;
    }
    public function render()
    {
        return view('livewire.website.checkout.checkout')->layout('layout.website.app');
    }
}
