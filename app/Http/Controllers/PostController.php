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
		  // return view('admin.post')->with('posts','$post');
		  // return view('admin.post',compact('post'));
		
   }
  public function addpost(Request $req){
  	$rules=array(
  		'title' =>'required',
  		'body'=>'required',
  		 );
  	$validator=Validator::make(input::all(),$rules);
  	if($validator->fails()) 
  		return response::json(array('errors' =>$validator->getMessageBag()->toarray()));
  	 
  	else{
  		$post=new Post;
  		$post->title=$req->title;
  		$post->body=$reg->body;
  		$post->save();
  		return response()->json($post);
  	}
  }
}
