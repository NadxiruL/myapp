<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        
            $posts = $posts = Post::select(['title','body'])->paginate(3);

            return view ('viewposting' , [
    
                'postx' => $posts
    
    
            ]);
    
        
    }


    
    public function store ( Request $request) {

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $post = Post::create([

            'title' => $request->title,
            'body' => $request->body

        ]);

        
    return redirect()->route('mypost')->with('success' , 'Posting Success!');

}

   



}
