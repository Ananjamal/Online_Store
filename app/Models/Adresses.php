<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','order_id','firstname','lastname', 'email', 'phone',
        'address_line1', 'address_line2',
        'country','city','state','zip_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
