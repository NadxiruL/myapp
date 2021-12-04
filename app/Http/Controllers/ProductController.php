<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;

class ProductController extends Controller
{

    protected $discount;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view ('product');
        
    }

    public function overview() {


        return view ('overview');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'descriptions' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'category' => 'required',
        ]);

        $products = Product::create([
        
            'name' => $request->name,
            'descriptions' => $request->descriptions,
            'price' => $request->price,
            'weight' => $request->weight,
            'stock' => $request->stock,
            'category' => $request->category,

           
            
        ]);

        dd($products);
     
     return redirect()->route('products')->with('success' , 'Posting Success!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
        $products = Product::select(['name','descriptions','price'])->paginate(9);

        return view ('storefront' , [

            'product' => $products

        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function allproducts () {

        $products = Product::select(['name','descriptions','price'])->paginate(6);


        return view ('allproducts' , [

            'product' => $products


        ]);


    }

    // public function loadCategory() {

    //     $category = Category::all();

    //     return view ('product' , [

    //         'categories' => $category
    //     ]);

    // }


    public function __get($discount){

        $this->discount;

    }

    public function __set($request , $discount) {

        $this->discount = $discount;

    }


}
