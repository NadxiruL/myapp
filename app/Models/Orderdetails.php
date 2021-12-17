<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orderdetails extends Model
{
    use HasFactory;

    protected $fillable = [

        'order_id',
        'product_id',
        'price',
        'quantity'

    ];


    public function orderdetails(){

        return $this->hasMany(Product::class);

    }

    public function toOrder()
    {

        return $this->belongsTo(Order::class);

    }

}
