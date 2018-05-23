<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;
class UserProfileController extends Controller
{
   function index($id){
        $data['data']=DB::table('users')->find($id);
        // dd($data);
            return view('auth.profile', array ('user'=>Auth::user()));


    }
    public function update (Request $request){
      
    	if($request->hasFile('pimage')){
    		 $pimage=$request->file('pimage');
    		 $filename=time().'.'.$pimage->getClientOriginalExtension();
    		 Image::make($pimage)->resize(300,300)->save(public_path('/uploads/pimage/'.$filename));
    		 $user=Auth::user();
    		 $user->pimage=$filename;
    		 $user->save();
    	}
    	return view('auth.profile', array ('user'=>Auth::user()));
    }
}
