<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index () {

        return view ('posting');

    }

    public function showSemua () {

        $posts = Post::select(['id','title','body'])->paginate(5);

      

        return view ('mypost' , [

            'post' => $posts


        ]);
    
    }

    public function showSatuSahaja ($id) {

        $post = Post::find($id);

            }



    public function edit ($id) {

        $post = Post::find($id);

        return view ('postingedit', [

            'posts' => $post


        ]);

    }


    public function update(Request $request, $id) {

        $post = Post::find($id);

        // $validated = $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return back()->with('success', 'posting updated!');

        
    }

    public function delete($id) {


        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('mypost')->with('success', 'posting deleted!');
    }
 

}
