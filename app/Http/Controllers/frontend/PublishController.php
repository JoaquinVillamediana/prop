<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\PlansModel;


class PublishController extends Controller {

    public function index() {

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
        return view('frontend/publish.index');
    }

    public function personal() {

        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and user_type = 2
   ');

return view('frontend/publish.personal',compact('aPlans'));
        // return view('frontend/publish.personal');
    }
    public function profesional() {

        
        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and user_type = 3
   ');

return view('frontend/publish.profesional',compact('aPlans'));

        // return view('frontend/publish.profesional');
    }

    
    public function personal_free() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish1',compact('aPropietie_type'));
    }


    public function create() {
        return view('admin/user.create');
    }

    public function pago($id) {

        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and id = "'.$id.'"
   ');

        return view('frontend/publish.pago',compact('aPlans'));
    }

}
