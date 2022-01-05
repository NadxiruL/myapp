<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //with is eager loading n+1 query
        $products = Product::with('category')->paginate();
        // dd($products);
        return view('products.index', [
            'products' => $products,
        ]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        //first args is folder and second args is "disk"
        $image = $request->file('file')->store('products', 'public');
        $request->merge(['image' => $image]);

        $product = Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Posting Success!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product         $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        $products = Product::select(['id', 'image', 'name', 'descriptions', 'price' , 'stock' , 'category_id'])->paginate(9);

        return view('storefront.index', [
            'product' => $products,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product         $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest $request
     * @param  \App\Models\Product                     $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {

        if ($request->has('file')) {
            //if user request to change new image:png
            $image = $request->file('file')->store('products', 'public');
            $request->merge(['image' => $image]);

            //logging to file as debug process.
            logger()->debug($request->all());
        }

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product         $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

}
