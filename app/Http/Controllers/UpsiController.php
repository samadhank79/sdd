<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbSender;
use App\Models\DbNatureInfo;
use App\Models\DbRecipienst;
use App\Models\DbUpsi;
use App\Models\DbUpsiBackup;

class UpsiController extends Controller
{
    function Home(Request $request){
        if($request->session()->has('admin')){
            $s = $request->session()->get('admin');
        }elseif ($request->session()->has('users')) {
            $s = $request->session()->get('users');
        }else{
            return redirect()->route('login');
        }
        $upsi = DbUpsi::select('db_upsis.id','db_nature_infos.natureinfo','db_senders.name as sender','db_recipiensts.name as recipienst','db_upsis.upsinum','db_nature_infos.natureinfo','db_upsis.sharingtype','db_upsis.dateofshare','db_upsis.periodofshare','db_upsis.confidentiality','db_upsis.effectivedate','db_upsis.descriptionagreement','db_upsis.purpose','db_upsis.remark','db_upsis.status','db_upsis.dsctime','db_upsis.descriptioninfo','db_upsis.confintimatdate','db_upsis.legitmate','db_upsis.modeofsharing','db_upsis.confintimatdate')
        ->leftjoin('db_senders','db_senders.id','db_upsis.sender_id')
        ->leftjoin('db_recipiensts','db_recipiensts.id','db_upsis.recipienst_id')
        ->leftjoin('db_nature_infos','db_nature_infos.id','db_upsis.natureinfo_id');
        // ->where('db_upsis.status','active')
        // ->where('db_upsis.user_id',$s->id)
        // ->get();
        if($s->id == 1){
            $upsi->where('db_upsis.status','active');
        }else{
            $upsi->where('db_upsis.status','active');
            $upsi->where('db_upsis.user_id',$s->id);
        }
        $upsi = $upsi->get();
        return view('Upsi.Home', compact('upsi'));
    }
    function Add(Request $request){
        date_default_timezone_set('Asia/Kolkata');



        if($request->session()->has('admin')){
            $s = $request->session()->get('admin');
        }elseif ($request->session()->has('users')) {
            $s = $request->session()->get('users');
        }else{
            return redirect()->route('login');
        }

        if($request->input('add')){


          //  return  $s->name.' '.date('Y-m-d h:i:s a');


         $validated = $request->validate([
            'natureinfo' => 'required',
            'legitmate' => 'required',
            'recipienst' => 'required',
            'sender' => 'required',
            'sharingtype' => 'required',
            'dateofshare' => 'required',
            'periodofshare'=>'required',
            'modeofsharing' => 'required',
            'enddate' => 'sometimes|required',
            'confidentiality' => 'required',
            'effectivedate' => 'sometimes|required',
            'descriptionagreement' => 'required',
            'confintimatdate' => 'sometimes|required',
            'status'=>'required',
            'purpose'=>'required',
            'descriptioninfo'=>'required',
            'remark'=>'required'
        ]);

         $upsi= new DbUpsi;
         $upsinum = 'UPSI-'.$randomNumber = random_int(100000, 999999);
         $upsi->upsinum = $upsinum;
         $upsi->natureinfo_id = $request->input('natureinfo');
         $upsi->legitmate = $request->input('legitmate');
         $upsi->sender_id = $request->input('sender');
         $upsi->recipienst_id = $request->input('recipienst');
         $upsi->sharingtype =  $request->input('sharingtype');
         $upsi->dateofshare =  $request->input('dateofshare');
         $upsi->periodofshare = $request->input('periodofshare');
         $upsi->modeofsharing =$request->input('modeofsharing');
         $upsi->enddate =$request->input('enddate')?$request->input('enddate'):null;
         $upsi->confidentiality =$request->input('confidentiality');

         $upsi->effectivedate = $request->input('effectivedate')?$request->input('effectivedate'):null;
            //$upsi->effectivedate =$request->input('effectivedate')?$request->input('effectivedate'):'0000-00-00';
            //$upsi->confintimatdate =$request->input('confintimatdate')?$request->input('confintimatdate'):'0000-00-00';
         $upsi->confintimatdate =$request->input('confintimatdate')?$request->input('confintimatdate'):null;
         $upsi->descriptionagreement =$request->input('descriptionagreement');
         $upsi->purpose =$request->input('purpose');
         $upsi->descriptioninfo =$request->input('descriptioninfo');
         $upsi->remark =$request->input('remark');
         $upsi->dsc =date('Y-m-d');
         $upsi->dsctime =$dsctime = $s->name.' '.date('Y-m-d h:i:s a');
         $upsi->user_id =$s->id;
         $upsi->status ='active';
         $upsi->save();
         return redirect()->back()->with('success', 'Successfully inserted..');

     }
     $natureinfo =  DbNatureInfo::where('status','active')->get();
     $recipt =  DbRecipienst::where('status','active')->get();
     $send =  DbSender::where('status','active')->get();
     return view('Upsi.Home',compact('natureinfo','recipt','send'));
 }


 function PreUpsiAdd (Request $request){
    date_default_timezone_set('Asia/Kolkata');

    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }

    if($request->input('add')){



        // return $request->predate;


        $validated = $request->validate([
            'natureinfo' => 'required',
            'legitmate' => 'required',
            'recipienst' => 'required',
            'sender' => 'required',
            'sharingtype' => 'required',
            'dateofshare' => 'required',
            'periodofshare'=>'required',
            'modeofsharing' => 'required',
            'enddate' => 'sometimes|required',
            'confidentiality' => 'required',
            'effectivedate' => 'sometimes|required',
            'descriptionagreement' => 'required',
            'confintimatdate' => 'sometimes|required',
            'status'=>'required',
            'purpose'=>'required',
            'descriptioninfo'=>'required',
            'remark'=>'required',
            'predate' => 'required',
        ]);

        $upsi= new DbUpsi;
        $upsinum = 'UPSI-'.$randomNumber = random_int(100000, 999999);
        $upsi->upsinum = $upsinum;
        $upsi->natureinfo_id = $request->input('natureinfo');
        $upsi->legitmate = $request->input('legitmate');
        $upsi->sender_id = $request->input('sender');
        $upsi->recipienst_id = $request->input('recipienst');
        $upsi->sharingtype =  $request->input('sharingtype');
        $upsi->dateofshare =  $request->input('dateofshare');
        $upsi->periodofshare = $request->input('periodofshare');
        $upsi->modeofsharing =$request->input('modeofsharing');
        $upsi->enddate =$request->input('enddate')?$request->input('enddate'):null;
        $upsi->confidentiality =$request->input('confidentiality');

        $upsi->effectivedate = $request->input('effectivedate')?$request->input('effectivedate'):null;
            //$upsi->effectivedate =$request->input('effectivedate')?$request->input('effectivedate'):'0000-00-00';
            //$upsi->confintimatdate =$request->input('confintimatdate')?$request->input('confintimatdate'):'0000-00-00';
        $upsi->confintimatdate =$request->input('confintimatdate')?$request->input('confintimatdate'):null;
        $upsi->descriptionagreement =$request->input('descriptionagreement');
        $upsi->purpose =$request->input('purpose');
        $upsi->descriptioninfo =$request->input('descriptioninfo');
        $upsi->remark =$request->input('remark');

        $stringdate = $request->predate;
        $timestemp = strtotime($stringdate);
        $predate = date('Y-m-d', $timestemp);
        $upsi->dsc =$predate;
        $upsi->dsctime =$s->name . ' ' .$request->predate;
        $upsi->user_id =$s->id;
        $upsi->status ='active';
        $upsi->save();
        return redirect()->back()->with('success', 'Successfully inserted..');

    }
    $natureinfo =  DbNatureInfo::where('status','active')->get();
    $recipt =  DbRecipienst::where('status','active')->get();
    $send =  DbSender::where('status','active')->get();
    return view('Upsi.Home',compact('natureinfo','recipt','send'));
}

function List(Request $request){

    // $upsi = DbUpsi::all();
    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }
    $upsi = DbUpsi::select('db_upsis.id','db_nature_infos.natureinfo','db_senders.name as sender','db_recipiensts.name as recipienst','db_upsis.upsinum','db_nature_infos.natureinfo','db_upsis.sharingtype','db_upsis.dateofshare','db_upsis.periodofshare','db_upsis.confidentiality','db_upsis.effectivedate','db_upsis.descriptionagreement','db_upsis.purpose','db_upsis.remark','db_upsis.status','db_upsis.dsctime','db_upsis.descriptioninfo','db_upsis.confintimatdate','db_upsis.legitmate','db_upsis.modeofsharing','db_upsis.confintimatdate','db_upsis.dsc')
    ->leftjoin('db_senders','db_senders.id','db_upsis.sender_id')
    ->leftjoin('db_recipiensts','db_recipiensts.id','db_upsis.recipienst_id')
    ->leftjoin('db_nature_infos','db_nature_infos.id','db_upsis.natureinfo_id');
    // ->where('db_upsis.status','active');
    
    
    if($s->id == 1){
        $upsi->where('db_upsis.status','active');
    }else{
        $upsi->where('db_upsis.status','active');
        $upsi->where('db_upsis.user_id',$s->id);
    }
    $upsi = $upsi->get();
    //->get();
    return view('Upsi.Home', compact('upsi'));

}
function Edit(Request $request,$id)
{
    date_default_timezone_set('Asia/Kolkata');
    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }

    $upsi = DbUpsi::find($id);

    if($request->input('update')){

     $upsiOld = DbUpsi::find($id);

     $validated = $request->validate([
        'natureinfo' => 'required',
        'legitmate' => 'required',
        'recipienst' => 'required',
        'sender' => 'required',
        'sharingtype' => 'required',
        'dateofshare' => 'required',
        'modeofsharing' => 'required',
        'enddate' => 'sometimes|required',
        'confidentiality' => 'required',
        'effectivedate' => 'sometimes|required',
        'descriptionagreement' => 'required',
        'confintimatdate' => 'sometimes|required',
        'status' => 'required',
        'purpose'=>'required',
        'remark'=>'required'

    ]);


     $upsinum = 'UPSI-'.$randomNumber = random_int(100000, 999999);
     $upsi->upsinum = $upsinum;
     $upsi->natureinfo_id = $request->input('natureinfo');
     $upsi->legitmate = $request->input('legitmate');
     $upsi->sender_id = $request->input('sender');
     $upsi->recipienst_id = $request->input('recipienst');
     $upsi->sharingtype =  $request->input('sharingtype');
     $upsi->dateofshare =  $request->input('dateofshare');
     $upsi->periodofshare = 'hh';
     $upsi->modeofsharing =$request->input('modeofsharing');
     $upsi->confidentiality =$request->input('confidentiality');
     $upsi->effectivedate =$request->input('effectivedate');
     $upsi->descriptionagreement =$request->input('descriptionagreement');
     $upsi->confintimatdate =$request->input('confintimatdate');

     $upsi->purpose =$request->input('purpose');
     $upsi->descriptioninfo =$request->input('descriptioninfo');
     $upsi->remark =$request->input('remark');
     $upsi->dsc = date('Y-m-d');
     $upsi->dsctime =$dsctime = $s->name.' '.date('Y-m-d h:i:s a');
     $upsi->user_id =$s->id;
     $upsi->status =$request->input('status');
     $upsi->save();


       //Last Updated Data



     $upsibackup = new DbUpsiBackup;
     $upsibackup->upsinum = $upsiOld->upsinum;
     $upsibackup->natureinfo_id = $upsiOld->natureinfo_id;
     $upsibackup->legitmate = $upsiOld->legitmate;
     $upsibackup->sender_id = $upsiOld->sender_id;
     $upsibackup->recipienst_id = $upsi->recipienst_id;
     $upsibackup->sharingtype =  $upsiOld->sharingtype;
     $upsibackup->dateofshare =  $upsiOld->dateofshare;
     $upsibackup->periodofshare = $upsiOld->periodofshare;
     $upsibackup->modeofsharing =$upsiOld->modeofsharing;
     $upsibackup->enddate =$upsiOld->enddate;
     $upsibackup->confidentiality =$upsiOld->confidentiality;
     $upsibackup->effectivedate =$upsiOld->effectivedate;
     $upsibackup->descriptionagreement =$upsiOld->descriptioninfo;
     $upsibackup->confintimatdate =$upsiOld->confintimatdate;
     $upsibackup->purpose =$upsiOld->purpose;
     $upsibackup->descriptioninfo =$upsiOld->descriptioninfo;
     $upsibackup->remark =$upsiOld->remark;
     $upsibackup->dsc =$upsiOld->dsc;
     $upsibackup->dsctime =$upsiOld->dsctime;
       // $upsibackup->status =$upsiOld->status;
     $upsibackup->status ='inactive';
     $upsibackup->last_id =$upsiOld->id;
     $upsibackup->user_id =$s->id;
     $upsibackup->updated_date =date(now());
     $upsibackup->save();
     return redirect()->route('upsi')->with('update', 'Successfully Updated....');

 }


 $natureinfo =  DbNatureInfo::where('status','active')->get();
 $recipt =  DbRecipienst::where('status','active')->get();
 $send =  DbSender::where('status','active')->get();

 return view('Upsi.Home', compact('upsi','natureinfo','recipt','send'));
}
function Delete (Request $request,$id){
    date_default_timezone_set('Asia/Kolkata');
    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }
    $upsiOld = DbUpsi::find($id);
    $upsi= DbUpsi::find($id);
    $upsi->status = 'inactive';
    $upsi->save();



    $upsibackup = new DbUpsiBackup;
    $upsibackup->upsinum = $upsiOld->upsinum;
    $upsibackup->natureinfo_id = $upsiOld->natureinfo_id;
    $upsibackup->legitmate = $upsiOld->legitmate;
    $upsibackup->sender_id = $upsiOld->sender_id;
    $upsibackup->recipienst_id = $upsi->recipienst_id;
    $upsibackup->sharingtype =  $upsiOld->sharingtype;
    $upsibackup->dateofshare =  $upsiOld->dateofshare;
    $upsibackup->periodofshare = $upsiOld->periodofshare;
    $upsibackup->modeofsharing =$upsiOld->modeofsharing;
    $upsibackup->confidentiality =$upsiOld->confidentiality;
    $upsibackup->effectivedate =$upsiOld->effectivedate;
    $upsibackup->descriptionagreement =$upsiOld->descriptioninfo;
    $upsibackup->confintimatdate =$upsiOld->confintimatdate;
    $upsibackup->purpose =$upsiOld->purpose;
    $upsibackup->descriptioninfo =$upsiOld->descriptioninfo;
    $upsibackup->remark =$upsiOld->remark;
    $upsibackup->dsctime =$upsiOld->dsctime;
       // $upsibackup->status =$upsiOld->status;
    $upsibackup->status ='inactive';
    $upsibackup->last_id =$upsiOld->id;
    $upsibackup->user_id =$s->id;
    $upsibackup->deleted_date =date(now());
    $upsibackup->save();

  //  return redirect()->route('upsi');
    return redirect()->route('upsi')->with('delete', 'Successfully Deleted..');
}
public function View(Request $request,$id)
{


    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }
    $upsi = DbUpsi::find($id);
    
    return view('Upsi.viewupsi',compact('upsi'));
    
}
}
