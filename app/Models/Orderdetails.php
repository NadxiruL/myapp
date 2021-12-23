<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//@TODO changed to proper naming
//all model should be singular
//OrderDetail
class OrderDetail extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return mixed
     */
    public function orderDetails()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * //@TODO change to proper standard practice for relationship
     * @return mixed
     */
    public function order()
    {
        return $this->belongsTo(Order::class);

    }

}
