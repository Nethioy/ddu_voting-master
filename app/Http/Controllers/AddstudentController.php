<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;

class AddstudentController extends Controller
{
  //    public function index()
  //   {   
		// $data=User::all();
  //       // dd($data);
  //           return view('admin.add_user', ['users' => $data]);
        
  //   }
	 public function index(){
     	$data = DB::table('users')->where('Status', '=', 'New')->get();
     	
   		return view('admin.add_user',['users' => $data]);
   }
}
