<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**@TODO changed
     * @var array
     */
    /**
     * @var array
     */
    protected $fillable = [

    ];

    //@TODO change to proper name follow Laravel naming standards
    /**
     * @return mixed
     */
    public function toOrder()
    {

        return $this->hasMany(Order::class);

    }
}
