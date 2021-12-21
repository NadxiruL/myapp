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
    protected $guarded = ['id'];

    /**
     * notes: standard practice defining relations
     * @return mixed
     */
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }

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
