<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use App\Models\MessagesModel;
use App\Models\PropertiesModel;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Hash;
use Auth;
class ContactController extends Controller {

    public function index() {

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
        return view('frontend/contact.index');
    }

    public function create() {
        return view('admin/user.create');
    }

    public function mail(Request $request){
        
        $name =  $request['name'];
        // $lname =  $request['lname'];
        
        $email =  $request['email'];
        
        $subject =  $request['subject'];
        
        $message =  $request['message'];

        $content="From: $name \n Email: $email \n Message: $message";
        $recipient = "joacovillamediana@gmail.com";
        $mailheader = "From: $email \r\n";

        mail($recipient, $subject, $content, $mailheader) or die("Error!");

        return view('frontend/home.index');
    }


    public function users_mail(Request $request, $user_id){
        
        if(!empty($request['name']) && !empty($request['message']) && !empty($request['email']) && !empty($request['property_id']))
        {

        $oUser = User::where('id',$user_id)->first();
        $oProperty = PropertiesModel::where('id',$request['property_id'])->first();
    

        $oContactDetails = new \stdClass();
        $oContactDetails->sender = 'TuProximaProp';
        $oContactDetails->receiver = $oUser->email;
        $oContactDetails->PropertyName = $oProperty->name;
        $oContactDetails->ContactName = $request['name'];
        $oContactDetails->ContactEmail = $request['email'];
        $oContactDetails->ContactNumber = $request['number'];
        $oContactDetails->ContactMessage = $request['message'];

        Mail::to($oUser->email)->send(new ContactEmail($oContactDetails));

        if(!empty(Auth::user()->id))
        {
            $user = Auth::user()->id;
        }
        else
        {
            $user = 0;
        }

        $dataxd=array('user_from_id' => $user,'user_to_id' => $user_id,'message' => $request['message']);
        MessagesModel::insert($dataxd);
        }
        
       
        return redirect()->route('home');
    }


}
