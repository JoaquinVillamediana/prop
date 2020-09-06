<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use App\Models\MessagesModel;

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
        $recipient = "brizuelaortizg@gmail.com";
        $mailheader = "From: $email \r\n";

        mail($recipient, $subject, $content, $mailheader) or die("Error!");

        return view('frontend/home.index');
    }


    public function users_mail(Request $request, $user_id){
        
        $user_mail= DB::select('SELECT email from users where id = "'.$user_id.'"');
       
        $name =  $request['name'];
        // $lname =  $request['lname'];
        
        $email =  $request['email'];
        
        $number =  $request['number'];
        $subject =  "Consulta en tuproximaprop.com";
        
        $message =  $request['message'];

        $content="From: $name \n Email: $email \n Message: $message \n Num. Cel.: $number ";
        // $recipient = "brizuelaortizg@gmail.com";
        $mailheader = "From: $email \r\n";

        mail($user_mail, $subject, $content, $mailheader) or die("Error!");

        if(!empty(Auth::user()->id))
        {
            $user = Auth::user()->id;
        }
        else
        {
            $user = 0;
        }

        $dataxd=array('user_from_id' => $user,'user_to_id' => $user_id,'message' => $content);
        MessagesModel::insert($dataxd);
       
        return redirect()->route('/home');
    }


}
