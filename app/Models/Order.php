<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','shipping_price', 'total_price', 'payment_method', 'order_status', 'payment_status']; // Add 'name' to this array

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function orderproduct()
    {
        return $this->hasone(OrderProduct::class);
    }


    public function adresses()
    {
        return $this->hasOne(Adresses::class);
    }
}
