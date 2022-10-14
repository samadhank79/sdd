<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbRecipienst;

class RecipienstController extends Controller
{
    function Home(Request $request)
    {
        $recipienst = DbRecipienst::all();
        return view('Recipienst.Home', compact('recipienst'));
    }
    function Add(Request $request)
    {
        if($request->input('add')){

           $validated = $request->validate([
            // 'name' => 'required|regex:/^[a-zA-Z]+$/',
             'name' => 'required|unique:db_recipiensts|regex:/^[a-zA-Z]/',
             'email' => 'required|email|unique:db_recipiensts',
             // 'idproof' => 'required|unique:db_recipiensts|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}/',
             'idproof' => 'required|unique:db_recipiensts',
             'designation' => 'required',
             'status' => 'required',
         ]);
           $recipienst = new DbRecipienst;
           $recipienst->name = $request->input('name');
           $recipienst->email = $request->input('email');
           $recipienst->idproof= $request->input('idproof');
           $recipienst->designation = $request->input('designation');
           $recipienst->status = $request->input('status');
           $recipienst->save();

           return redirect()->back()->with('success', 'Successfully inserted..');

       }
       return view('Recipienst.Home');
   }
   function List(Request $request)
   {
    $recipienst = DbRecipienst::all();
    return view('Recipienst.Home', compact('recipienst'));
}
function Edit(Request $request,$id)
{
    $recipienst = DbRecipienst::find($id);
    if($request->input('update')){
     $validated = $request->validate([
        // 'name' => 'required|regex:/^[a-zA-Z]+$/',
        'name' => 'required|regex:/^[a-zA-Z]/|unique:db_recipiensts,name,'.$recipienst->id,
        'email' => 'required|regex:/^[a-zA-Z]/|unique:db_recipiensts,email,'.$recipienst->id,
        // 'idproof' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}/| unique:db_recipiensts,idproof,'.$recipienst->id,
        'idproof' => 'required|unique:db_recipiensts,idproof,'.$recipienst->id,
        'designation' => 'required',
        'status' => 'required',
    ]);

     $recipienst->name = $request->input('name');
     $recipienst->email = $request->input('email');
     $recipienst->idproof= $request->input('idproof');
     $recipienst->designation = $request->input('designation');
     $recipienst->status = $request->input('status');
     $recipienst->save();

     return redirect()->route('recipienst')->with('update', 'Successfully Updated....');
 }
 return view('Recipienst.Home', compact('recipienst'));
}
function Delete (Request $request,$id){
    $recipienst = DbRecipienst::find($id);
    $recipienst->delete();
    
    return redirect()->route('recipienst')->with('delete', 'Successfully Deleted..');
}
}
