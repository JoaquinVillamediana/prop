<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PropietiesController extends Controller {

    public function index() {

        // $aUsers = User::get();
        
        return view('frontend/propieties.index');
    }

  

}
