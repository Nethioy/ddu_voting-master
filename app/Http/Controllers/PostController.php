<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Response;
use Illuminate\Support\Facedes\input; 
use App\http\Requests;
class PostController extends Controller
{
   public function index()
      {
          //1
        //  $posts = Post::all();
            //$posts = Post::orderBy('id', 'desc')->get();
            $posts = Post::orderBy('id', 'desc')->paginate(7);
          return view('admin/posts.index', ['posts' => $posts]);
	  }
   public function create()
      {
          //2
          return view('admin/posts.create');
	  }
   public function store(Request $request)
      {
         //3
        // echo $request->title;
        $this->validate($request,[
            'title' => 'required|min:3',
            'body' =>  'required|min:10'
        ]);
        Post::create([
            'title' => $request->title,
            'body' =>  $request->body,
        ]);
       // return 'Blen';
       return redirect(route('posts.index'));
      }
    public function show(Post $post)
      {
        //4
        return view('admin/posts.show', ['post' => $post]);
      }
    public function edit(Post $post)
      {
          //5
          return view('admin/posts.edit', compact('post'));
      } 
    public function update(Request $request, Post $post)
       {
         //6
         $post->title = $request->title;
         $post->body = $request->body;
         $post->save();
         session()->flash('message', 'Your post have been updated successfully');
         return redirect()->back();
       }
    public function destroy(Post $post)
       {
           //7
           $post->delete();
           return redirect(route('posts.index'));
       }
}
