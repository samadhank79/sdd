<?php

namespace App\Http\Controllers;

use App\Models\DbSender;
use Illuminate\Http\Request;

class SenderController extends Controller
{
    function Home(Request $request)
    {
        $senders = DbSender::all();
        return view('Senders.Home', compact('senders'));
    }
    function Add(Request $request)
    {

        if($request->input('add')){

         $validated = $request->validate([
            // 'name' => 'required|unique:db_senders| regex:/^[a-zA-Z]+$/',
            'name' => 'required|unique:db_senders|regex:/^[a-zA-Z]/',
            // 'idproof' => 'required|unique:db_senders|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}/',
            'idproof' => 'required|unique:db_senders',
            'designation' => 'required',
            'status' => 'required',
        ]);

         $sender = new DbSender;
         $sender->name = $request->input('name');
         $sender->idproof= $request->input('idproof');
         $sender->designation = $request->input('designation');
         $sender->status = $request->input('status');
         $sender->save();
         return redirect()->back()->with('success', 'Successfully inserted..');
     }
     return view('Senders.Home');
 }
 function List(Request $request)
 {
    $senders = DbSender::all();
    return view('Senders.Home', compact('senders'));
}
function Edit(Request $request,$id)
{
    $sender = DbSender::find($id);
    if($request->input('update')){
       $validated = $request->validate([
        // 'name' => 'required|regex:/^[a-zA-Z]+$/|unique:db_senders,name,'.$sender->id,
        'name' => 'required|regex:/^[a-zA-Z]/|unique:db_senders,name,'.$sender->id,
        // 'idproof' => 'required|regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}/| unique:db_senders,idproof,'.$sender->id,
        'idproof' => 'required|unique:db_senders,idproof,'.$sender->id,
        'designation' => 'required',
        'status' => 'required',
    ]);
       $sender->name = $request->input('name');
       $sender->idproof= $request->input('idproof');
       $sender->designation = $request->input('designation');
       $sender->status = $request->input('status');
       $sender->save();
       return redirect()->route('senders')->with('update', 'Successfully Updated....');
   }


   return view('Senders.Home', compact('sender'));
}
function Delete (Request $request,$id){
    $recipienst = DbSender::find($id);
    $recipienst->delete();
    
    return redirect()->route('senders')->with('delete', 'Successfully Deleted..');
}
}
