<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image']; // Add 'name' to this array


    public function product()
    {
        return $this->hasMany(Product::class);
    }
    // public function getImageAttribute($value)
    // {
    //      return url('storage/' . $value);

    // }
}
