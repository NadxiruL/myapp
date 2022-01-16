<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Session;

class CheckoutController extends Controller
{

    public function index($id)
    {
        $checkouts = Checkout::find($id)->with('product');
        // return view('checkouts', compact('checkouts'));

        return view('checkouts',[
            'name' => $checkouts->product->name,
            'price' => $checkouts->product->price,
        ]);
    }

    public function store(StoreCheckoutRequest $request ,$id)
    {

    //$checkouts = Checkout::create($request->all());
     $checkouts = Checkout::create([
          'checkout_product_id' => $request->product_id,
           'product_price' => $request->product_price,
           'product_name' => $request->product_name,
           'product_quantity' => $request->product_quantity,
        ]);

        $quantity = $request->product_quantity;
        $price = $request->product_price;

        $total_price = $quantity * $price;

        $checkouts->total_price = $total_price;

        $checkouts->save();

        $stocks = Product::find($id);

        //dd($stocks);
        //deduct stock quantity after user buy products.
        $quantity = $request->product_quantity;
        $newStock = $request->product_stock;

        $newTotal = $newStock - $quantity;

        $stocks->stock = $newTotal;
        $stocks->save();

        // $total =
       // event(new \App\Events\UserLoggedInEvent(auth()->user()));
       return redirect()->route('checkout.index');
    }


}

