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
    public function index()
    {
        
            $posts = Post::all();

            return view ('viewposting' , [
    
                'postx' => $posts
    
    
            ]);
    
        
    }


    
    public function store( Request $request) {

        $post = Post::create([

            'title' => $request->title,
            'body' => $request->body

        ]);

        

    return redirect()->route('mypost');

}




}
