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
/*	 public function index(){
     	$data = DB::table('users')->where('Status', '=', 'New')->get();
     	
       return view('admin.add_user',['users' => $data]); */
       public function index()
       {
           //1
         //  $users = user::all();
             //$users = user::orderBy('id', 'desc')->get();
             $users = user::orderBy('id', 'desc')->paginate(3);
           return view('admin/addusers.index', ['users' => $users]);
     }
    public function create()
       {
           //2
           return view('admin/addusers.create');
     }
    public function store(Request $request)
       {
          //3
         // echo $request->title;
         $this->validate($request,[
             'title' => 'required|min:3',
             'body' =>  'required|min:10'
         ]);
         user::create([
             'title' => $request->title,
             'body' =>  $request->body,
         ]);
        // return 'Blen';
        return redirect(route('users.index'));
       }
     public function show(user $user)
       {
         //4
         return view('admin/addusers.show', ['user' => $user]);
       }
     public function edit(user $user)
       {
           //5
           return view('admin/addusers.edit', compact('user'));
       } 
     public function update(Request $request, Post $post)
        {
          //6
          $user->student_id = $request->student_id;
          $user->fname = $request->fname;
          $user->lname = $request->lname;
          $user->fname = $request->fname;
          $user->department = $request->department;
          $user->batch = $request->batch;
          $user->save();
          session()->flash('message', 'Your user have been updated successfully');
          return redirect()->back();
        }
     public function destroy(user $user)
        {
            //7
            $user->delete();
            return redirect(route('users.index'));
        }
   }

