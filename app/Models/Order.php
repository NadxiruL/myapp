<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [

        'customer_id',
        'amount',
        'shipping_address',
        'status',

    ];

//Route::resource('categories', CategoryController::class);

    /**
     * @return mixed
     */
    public function toCustomer()
    {

        return $this->belongsTo(Customer::class);

    }

    /**
     * @return mixed
     */
    public function toOrdeDetails()
    {

        return $this->hasMany(Orderdetails::class);

    }
}
