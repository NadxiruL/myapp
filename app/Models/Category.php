<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //@TODO move this to guarded instead
    /**
     * @var array
     */
    protected $fillable = [

        'name',

    ];

    /**
     * @return mixed
     */
    public function toProducts()
    {
        //@TODO assign FK and PK to below relationship
        return $this->hasMany(Product::class);
    }
}

// Category extends Model

// public function getTotal () {
