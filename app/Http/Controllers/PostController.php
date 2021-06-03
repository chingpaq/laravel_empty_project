<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        //$posts = Post::get(); //gets collection
        //$posts = Post::paginate(5);

        // eagle loading
        //$posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(5);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(5);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }

    public function  store(Request $request){
        $this->validate($request,[
           'body' => 'required'
        ]);

        // this basic approach
//        Post::create([
//            'user_id' => auth()->id(),
//            'body' => $request->body
//        ]);

        //dd($request->only('body'));
        // this is through eloquent relationships
//        $request->user()->posts()->create([
//            'body' => $request->body
//        ]) ;
        // or use this shortened format
        //outright retrieve a map
        $request->user()->posts()->create($request->only('body'));
        return back();
    }

    Public function destroy(Post $post){
//        if (!$post->ownedBy(auth()->user())){
//
//        }

        //this is using policy methods
        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
