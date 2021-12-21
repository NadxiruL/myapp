<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('categorylist');
    }

    public function create()
    {
        return view('createcategory');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        Category::create([

            'name' => $request->name,

        ]);

        return redirect()->route('category-create')->with('success', 'Category added!');

    }

    public function show()
    {

        $category = Category::all();

        return view('categorylist', [

            'categories' => $category,

        ]);

    }

    public function loadCategory()
    {

        $categoryselect = Category::all();

        return view('product', [

            'categories' => $categoryselect,

        ]);

    }

    /**
     * @param $id
     */
    public function destroy($id)
    {

        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category-list');

    }

}
