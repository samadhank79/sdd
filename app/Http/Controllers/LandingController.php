<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\DbRole;
use App\Models\DbUser;
use App\Models\DbUpsi;
use App\Models\DbExpire;
use App\Models\DbUpsiBackup;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class LandingController extends Controller
{
    function Home(Request $request){

        if($request->session()->has('admin')){
            $s = $request->session()->get('admin');
        }elseif ($request->session()->has('users')) {
            $s = $request->session()->get('users');
        }else{
            return redirect()->route('login');
        }


        $active = DbUpsi::where('status','active')->where('user_id',$s->id)->count();
        $inactive  =DbUpsiBackup::where('status','inactive')->where('user_id',$s->id)->count();

        return view('Home',compact('active','inactive'));    
    }
    
    public function DataFlow (Request $request)
    {
        //$activeUpsi = DbUpsi::where('status','active')->get();

        if($request->session()->has('admin')){
            $s = $request->session()->get('admin');
        }elseif ($request->session()->has('users')) {
            $s = $request->session()->get('users');
        }else{
            return redirect()->route('login');
        }
        $activeUpsi = DbUpsi::select('db_upsis.id','db_nature_infos.natureinfo','db_senders.name as sender','db_recipiensts.name as recipienst','db_upsis.upsinum','db_nature_infos.natureinfo','db_upsis.sharingtype','db_upsis.dateofshare','db_upsis.periodofshare','db_upsis.confidentiality','db_upsis.effectivedate','db_upsis.descriptionagreement','db_upsis.purpose','db_upsis.remark','db_upsis.status','db_upsis.dsc', 'db_upsis.dsctime','db_upsis.descriptioninfo','db_upsis.confintimatdate','db_upsis.legitmate','db_upsis.modeofsharing','db_upsis.confintimatdate')
        ->leftjoin('db_senders','db_senders.id','db_upsis.sender_id')
        ->leftjoin('db_recipiensts','db_recipiensts.id','db_upsis.recipienst_id')
        ->leftjoin('db_nature_infos','db_nature_infos.id','db_upsis.natureinfo_id');
        // ->where('db_upsis.status','active')
        // ->where('db_upsis.user_id',$s->id)
        // ->get();
        if($s->id == 1){
            $activeUpsi->where('db_upsis.user_id',$s->id);
            $activeUpsi->where('db_upsis.status','active');
        }else{
            $activeUpsi->where('db_upsis.status','active');
            $activeUpsi->where('db_upsis.user_id',$s->id);
        }
        $activeUpsi = $activeUpsi->get();

        return view('DataFlow',compact('activeUpsi'));    
    }
    function ViewDataFlow(Request $request,$id){
       if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }
    $activeUpsi = DbUpsi::find($id);
    return view('ViewDataFlow',compact('activeUpsi'));
}

function Audit (Request $request){
    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }
    $inactiveUpsi = DbUpsiBackup::select('db_upsi_backups.id','db_upsi_backups.last_id','db_upsi_backups.updated_date','db_upsi_backups.deleted_date','db_nature_infos.natureinfo','db_senders.name as sender','db_recipiensts.name as recipienst','db_upsi_backups.upsinum','db_nature_infos.natureinfo','db_upsi_backups.sharingtype','db_upsi_backups.dateofshare','db_upsi_backups.periodofshare','db_upsi_backups.confidentiality','db_upsi_backups.effectivedate','db_upsi_backups.descriptionagreement','db_upsi_backups.purpose','db_upsi_backups.remark','db_upsi_backups.status', 'db_upsi_backups.dsc','db_upsi_backups.dsctime','db_upsi_backups.descriptioninfo','db_upsi_backups.confintimatdate','db_upsi_backups.legitmate','db_upsi_backups.modeofsharing','db_upsi_backups.confintimatdate')
    ->leftjoin('db_senders','db_senders.id','db_upsi_backups.sender_id')
    ->leftjoin('db_recipiensts','db_recipiensts.id','db_upsi_backups.recipienst_id')
    ->leftjoin('db_nature_infos','db_nature_infos.id','db_upsi_backups.natureinfo_id');
        // ->where('db_upsis.status','active')
        // ->where('db_upsis.user_id',$s->id)
        // ->get();
    if($s->id == 1){
        $inactiveUpsi->where('db_upsi_backups.user_id',$s->id);
        $inactiveUpsi->where('db_upsi_backups.status','inactive');
    }else{
        $inactiveUpsi->where('db_upsi_backups.status','inactive');
        $inactiveUpsi->where('db_upsi_backups.user_id',$s->id);
    }
    $inactiveUpsi = $inactiveUpsi->get();
    return view('Audit',compact('inactiveUpsi'));  

}


function Login(Request $request){
    if($request->input('signin')){

            // $validator = $request->validate([

            //     'email' => 'required|exists:db_users,email',
            //     'passwd' => 'required',
            // ]);



     $validator = Validator::make($request->all(), [
        'email' => 'required|email|exists:db_users,email',
        'passwd' => 'required'
    ]);

     if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    } else {

        $email = $request->input('email');
        $password = $request->input('passwd');
        $user = DbUser::where('email',$email)->where('status','active')->first();
        if($user){
            if(Hash::check($password,$user->password)){
                if($user->designation == 'Admin'){
                    $request->session()->put('admin',$user);
                }else{
                    $request->session()->put('users',$user);
                }

                //return redirect()->route('checkactivation');
                return redirect()->route('dashboard');
            }else{

                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'passwd' => 'Wrong password or this account not approved yet.',
                ]);
            }
        }else{
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'User Not Exist  or this account not approved yet.',
            ]);
        }



    }

}
return view('Login');
}
function Logout(Request $request){
    if($request->session()->has('admin')){
        $request->session()->forget('admin');
        return redirect()->route('login');
    }else{
        $request->session()->forget('users');
        return redirect()->route('login');
    }
}

function ChangePassword (Request $request){

    if($request->session()->has('admin')){
        $s = $request->session()->get('admin');
    }elseif ($request->session()->has('users')) {
        $s = $request->session()->get('users');
    }else{
        return redirect()->route('login');
    }
    if($request->input('change')){

        $validator = Validator::make($request->all(), [
            'oldpasswd' => 'required',
            'newpasswd' => 'required',
            'confirmpasswd' => 'required'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{

            $oldpasswd =  $request->input('oldpasswd');
            $newpasswd =  $request->input('newpasswd');
            $confirmpasswd =  $request->input('confirmpasswd');
            if(Hash::check($oldpasswd,$s->password)){
                if($newpasswd === $confirmpasswd){
                    $user =  DbUser::find($s->id);
                    $user->password = Hash::make($newpasswd);
                    $user->save();
                    //$request->session()->forget($s->name);
                    return redirect()->route('login');
                }else{
                    return redirect()->back()->withInput($request->only('oldpasswd'))->withErrors([
                        'confirmpasswd' => 'Confirm Password Is Not Match....',
                    ]);
                }
            }else{

                return redirect()->back()->withInput($request->only('oldpasswd'))->withErrors([
                    'oldpasswd' => 'Old Password Not Match....',
                ]);
            }    
        }

        
    }
    //if(Hash::check($s->password,)
    return view('ChangePassword');
}

public function verify(Request $request){
    if($request->input('verify')){


        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $email = $request->input('email');
            $user = DbExpire::where('email',$email)->first();
            if($user){

                $registerdate = strtotime($user->registerdate);
                $expirationdate = strtotime($user->expirationdate);
                if(strtotime(date("Y/m/d"))< $expirationdate){
                    return redirect()->route('admincredential');
                }else{

                    return redirect()->route('activation');
                }
            }else{

                return redirect()->route('activation');

                // return redirect()->back()->withInput($request->only('email'))->withErrors([
                //     'email' => 'User Not Exist  or this account not Verified yet.',
                // ]);
            }
        }


}
return view('verify');
}

public function Activation(Request $request)
{
    if($request->input('activate')){
        // $expire = new DbExpire;
        // $validator = Validator::make($request->all(), [
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'email' => 'required|unique:db_expires',

        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // } else {
        //     return redirect()->route('verify');
        // }

        // return $email = $request->input('email');

        // $expire->firstname = $request->input('firstname');
        // $expire->lastname = $request->input('lastname');
        // $expire->email = $request->input('email');
        // $expire->registerdate  = date("Y/m/d");
        // $expire->expirationdate   = date('Y/m/d', strtotime('+ 1 days'));
        // $expire->save();

    }
    return view('Activation');
}


function Register(Request $request){
    $role =  DbRole::all();
    return view('Register',compact('role'));
}
}
