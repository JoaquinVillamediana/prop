<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PublishController extends Controller {

    public function index() {

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
        return view('frontend/publish.index');
    }

    public function personal() {
        return view('frontend/publish.personal');
    }
    public function profesional() {
        return view('frontend/publish.profesional');
    }

    public function create() {
        return view('admin/user.create');
    }

}
