<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::with('product')->get();

        return view('categories.index', [
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

        //for reference
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|unique:categories,name|min:5',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->route('categories.create')->withErrors($validator->messages());
        // }

        $request->validate([
            'name' => 'required|unique:categories,name|min:5',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.create')->with('success', 'Category added!');

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

        return redirect()->route('categories.index');

    }

}
