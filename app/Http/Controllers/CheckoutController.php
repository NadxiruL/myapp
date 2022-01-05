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

    public function index()
    {
        $checkouts = Checkout::with('product')->get();
        // return view('checkouts', compact('checkouts'));

        return view('checkouts',[
            'chekcouts' => $checkouts,
        ]);
    }

    public function store(StoreCheckoutRequest $request)
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

         $total_price = $quantity * $price;

        $checkouts->total_price = $total_price;

        $checkouts->save();

        // $total =
       // event(new \App\Events\UserLoggedInEvent(auth()->user()));
       return redirect()->route('checkout.index');
    }

    public function updateStock(){

    $stocks = Product::findorFail();

    }

}

