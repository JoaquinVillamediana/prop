<?php

namespace App\Http\Controllers\frontend;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller {

    public function index() {

        // $aUsers = User::get();
        $aPropieties = PropietiesModel::get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();
        
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        

        return view('frontend/search.index',compact('aPropieties','aOperationType','aPropietie_type'));
    }

  

}
