<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RuserController extends Controller {

    public function index() {

     
        return view('frontend/register.index');
    }

    public function create() {
        return view('admin/user.create');
    }

}
