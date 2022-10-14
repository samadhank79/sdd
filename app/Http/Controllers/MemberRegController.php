<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbUser;
use Illuminate\Support\Facades\Hash;

class MemberRegController extends Controller
{
  function Home(Request $request)
  {
   $users = DbUser::where('email','!=','admin@gmail.com')->get();
   return view('Member.Home', compact('users'));
 }
 function Add(Request $request)
 {
  if($request->input('add')){

   $validated = $request->validate([
     
    'name' => 'required|regex:/^[a-zA-Z]/',
    'email' => 'required|unique:db_users',
    'passwd' => 'required',
    'status' => 'required',
    'designation' => 'required',
  ]);

   $user = new DbUser;
   $user->name = $request->input('name');
   $user->email= $request->input('email');
   $user->password = Hash::make($request->input('passwd'));
   $user->designation = $request->input('designation');
   $user->role = 'User';
   $user->status = $request->input('status');
   $user->save();
   return redirect()->back()->with('success', 'Successfully inserted..');
 }
 return view('Member.Home');
}
function List(Request $request)
{
 $users = DbUser::where('email','!=','admin@gmail.com')->get();
 return view('Member.Home', compact('users'));
}
function Edit(Request $request,$id)
{
  $user = DbUser::find($id);
  if($request->input('update')){

    $validated = $request->validate([
     
     'name' => 'required|regex:/^[a-zA-Z]/',
     'email' => 'required|regex:/^[a-zA-Z]/|unique:db_users,email,'.$user->id,
     'designation' => 'required',
     'status' => 'required',
   ]);
    $user->name = $request->input('name');
    $user->email= $request->input('email');
    $user->designation = $request->input('designation');
    $user->status = $request->input('status');
    $user->save();
    return redirect()->route('member')->with('update', 'Successfully Updated....');
  }


  return view('Member.Home', compact('user'));
}
function Delete (Request $request,$id){
 $user = DbUser::find($id);
 $user->delete();

 return redirect()->route('member')->with('delete', 'Successfully Deleted..');
}
}
