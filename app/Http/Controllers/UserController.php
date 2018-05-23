<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
class UserController extends Controller
{
     public function index(){
     	$data = DB::table('users')->where('Status', '=', 'New')->get();
     	dd($data);
   		return view('admin.add_user',['users' => $data]);
   }
    public function previlage(){
		$data=User::all();
        // dd($data);
            return view('admin.previlage', ['users' => $data]);
        
    }
}
