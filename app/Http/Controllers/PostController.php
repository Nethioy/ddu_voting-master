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
   public function index(){
	
   		$post = Post::all();
		 return view('admin.post',['posts' => $post]);
       // return view('admin.post',compact('post'));
}
   public function addPost(Request $req){
	  if($req->ajax())
	     {
			 $post = post::create($req->all());
			// response($posts);
			//return response($req->all());
		 }
		 
   }
}