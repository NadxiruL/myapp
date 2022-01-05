<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    public $guarded = ['id'];


    public function product()
    {

        return $this->belongsTo(Product::class, 'checkout_product_id' , 'id');

    }

    // public function category()
    // {

    //     return $this->hasMany(Category::class, 'category_id' , 'id');

    // }

}
