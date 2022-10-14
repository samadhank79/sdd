<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbNatureInfo;

class NatureInfoController extends Controller
{
  function Home(Request $request)
  {
    $natureinfo = DbNatureInfo::all();
    return view('NatureInfo.Home', compact('natureinfo'));
 }
 function Add(Request $request)
 {

    if($request->input('add')){

       $validated = $request->validate([
         'natureinfo' => 'required|unique:db_nature_infos',
         'status' => 'required',

      ]);

       $natureinfo = new DbNatureInfo;
       $natureinfo->natureinfo = $request->input('natureinfo');
       $natureinfo->status = $request->input('status');
       $natureinfo->save();
           //return redirect()->route('listnatureinfo');
       return redirect()->back()->with('success', 'Successfully inserted..');

    }
    return view('NatureInfo.Home');
 }
 function List(Request $request)
 {
  $natureinfo = DbNatureInfo::all();
  return view('NatureInfo.Home', compact('natureinfo'));
}
function Edit(Request $request,$id)
{


  $natureinfo = DbNatureInfo::find($id);
  if($request->input('update')){

     $validated = $request->validate([
      'natureinfo' => 'required|unique:db_nature_infos,natureinfo,'.$natureinfo->id,
      'status' => 'required',

   ]);
     $natureinfo->natureinfo = $request->input('natureinfo');
     $natureinfo->status = $request->input('status');
     $natureinfo->save();

     return redirect()->route('natureinfo')->with('update', 'Successfully Updated....');

  }
  return view('NatureInfo.Home', compact('natureinfo'));
}
function Delete(Request $request,$id)
{
   $natureinfo = DbNatureInfo::find($id);
   $natureinfo->delete();
   return redirect()->route('natureinfo')->with('delete', 'Successfully Deleted..');
}
}
