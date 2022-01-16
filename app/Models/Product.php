<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function checkout()
    {
        return $this->hasMany(Checkout::class, 'checkout_product_id' , 'id');
    }

    // public function getStockAttribute($stock , Request $request){

    //     // $checkouts = Checkout::select('product_quantity')->get();

    //     // $checkouts->$request->product_quantity;

    //     // $total = $stock - $checkouts;

    //     // return $total;

    // }

}
