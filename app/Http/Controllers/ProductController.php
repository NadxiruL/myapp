<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var mixed
     */
    protected $discount;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();

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
        // $product = Product::create([
        //     'name'         => $request->name,
        //     'descriptions' => $request->descriptions,
        //     'price'        => $request->price,
        //     'weight'       => $request->weight,
        //     'stock'        => $request->stock,
        //     'category_id'  => $request->category_id,
        // ]);

        //alternative way to store data
        $request->merge(['category_id' => 1]);
        $product = Product::create($request->all());

        //return redirect()->back()->with('success', 'Posting Success!');
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

        $products = Product::select(['id', 'name', 'descriptions', 'price'])->paginate(9);

        return view('storefront', [

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest $request
     * @param  \App\Models\Product                     $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
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

    public function allproducts()
    {

        $products = Product::select(['name', 'descriptions', 'price'])->paginate(6);

        return view('allproducts', [

            'product' => $products,

        ]);

    }

    public function overview()
    {

        return view('overview');

    }

    // public function loadCategory() {

    //     $category = Category::all();

    //     return view ('product' , [

    //         'categories' => $category
    //     ]);

    // }

}
