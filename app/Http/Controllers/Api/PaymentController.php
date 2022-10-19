<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\DbExpire;

class PaymentController extends Controller
{
    function Verify(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            
        ]);
        if($validator->passes()) {
            $email = $request->input('email');
            $user = DbExpire::where('email',$email)->first();
            if($user){

                $registerdate = strtotime($user->registerdate);
                $expirationdate = strtotime($user->expirationdate);
                if(strtotime(date("Y/m/d"))< $expirationdate){
                    //return redirect()->route('admincredential');
                    return response()->json(['route'=>'admincredential']);
                }else{

                    return response()->json(['route'=>'activation']);
                    // return redirect()->route('activation');
                }
            }else{

                return response()->json(['route'=>'activation']);
                //return redirect()->route('activation');

                // return redirect()->back()->withInput($request->only('email'))->withErrors([
                //     'email' => 'User Not Exist  or this account not Verified yet.',
                // ]);
            }

            return response()->json(['success'=>'Added new records.']);
            
        }


        return response()->json(['error'=>$validator->errors()]);
    }
    function Activate(Request $request){
        $expire = new DbExpire;
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            
        ]);
        if($validator->passes()) {

            $email =  DbExpire::where('email',$request->input('email'))->first();
            if ($email) {
                if(strtotime(date("Y/m/d"))<  strtotime($email->expirationdate)){
                    //return redirect()->route('admincredential');
                    return response()->json(['route'=>'admincredential']);
                }
                return response()->json(['route'=>'verify']);
            }
            
        }else{
            return response()->json(['error'=>$validator->errors()]);
        }
        
    }
    function Pay(Request $request)
    {
       $email =  DbExpire::where('email',$request->input('email'))->first();
       if($email){

        $email->registerdate  = date("Y/m/d");
        $email->expirationdate   = date('Y/m/d', strtotime('+ 1 days'));
        $email->save();
        return response()->json(['route'=>'verify']);
    }else{
        $expire = new DbExpire;
        $expire->firstname = $request->input('firstname');
        $expire->lastname = $request->input('lastname');
        $expire->email = $request->input('email');
        $expire->registerdate  = date("Y/m/d");
        $expire->expirationdate   = date('Y/m/d', strtotime('+ 1 days'));
        $expire->save();
        return response()->json(['route'=>'verify']);
    }


}
}
