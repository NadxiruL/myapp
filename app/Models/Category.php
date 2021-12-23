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
    protected $guarded = ['id'];

    /**
     * @return mixed
     */
    public function product()
    {
        //reverse releationships
        return $this->belongsTo(Product::class, 'id', 'category_id');
    }
}
