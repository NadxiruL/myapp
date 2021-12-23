<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all();

        return view('categories.index',[
        'categories' => $categories,

        ]);

    }

    public function create()
    {
        return view('categories.create');
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
