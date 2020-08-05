<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PropietiesController extends Controller {

    public function index() {

        // $aUsers = User::get();
        
        return view('admin/propieties.index');
    }

  

}
