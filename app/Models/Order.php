<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'customer_id',
        'amount',
        'shipping_address',
        'status'

    ];


    public function toCustomer()
    {

        return $this->belongsTo(Customer::class);

    }

    public function toOrdeDetails()
    {

        return $this->hasMany(Orderdetails::class);

    }
}
