<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;


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

    
    public function personal_free() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish1',compact('aOperationType','aPropietie_type'));
    }


    public function create() {
        return view('admin/user.create');
    }

}
