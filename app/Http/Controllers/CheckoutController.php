<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Session;

class CheckoutController extends Controller
{

    public function checkout (Request $request)
    {


        $request->validate([
            'product_id' => 'required',
            'product_name' => 'required'
        ]) ;

        // $order = Order::create([

        //     'product_id' => $request->product_id,
        //     'product_name' => $request->product_name,
        //     'product_price' => $request->product_price

        // ]);

        return view('checkouts');

    }


    public function storeCheckout (Request $request)
    {

        $request->session()->put('key', 'value');

    }






}
