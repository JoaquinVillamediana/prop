<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; 

use Auth;
use Hash;

class PropietiesController extends Controller {

    public function index() {

        // $aUsers = User::get();
        
        $user=Auth::user()->id;

        $aPropieties=DB::select('SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and user_id = "'.$user.'"
    
   ');

   return view('frontend/propieties.index',compact('aPropieties'));
        // return view('frontend/propieties.index');
    }

  

}
