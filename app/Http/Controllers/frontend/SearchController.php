<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller {

    public function index() {

        // $aUsers = User::get();
        
        return view('frontend/search.index');
    }

  

}
