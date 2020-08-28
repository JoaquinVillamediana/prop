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

use Auth;
use Hash;
class MessageController extends Controller {

    public function index() {
     
        $id= Auth::user()->id;
        $aChats=DB::select('SELECT m.*,(u.name) as nombre_usuario
        FROM messages m
        LEFT JOIN users u  ON (m.user_from_id = u.id )
        where m.deleted_at is null
        and (m.user_from_id = "'.$id.'" or m.user_to_id = "'.$id.'")
        
        GROUP BY m.id 
        ORDER BY m.created_at
   ');

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
        return view('frontend/messages.index',compact('aChats'));
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

    // publicar
    public function publish_login1() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish1',compact('aPropietie_type'));
    }

    public function publish_login2() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish2',compact('aPropietie_type'));
    }

    public function publish_login3() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish3',compact('aPropietie_type'));
    }


    public function publish_login4() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish4',compact('aPropietie_type'));
    }

    public function propietie_type() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish.publicationtype',compact('aOperationType'));
    }




// 



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

    public function cobro() {
        return view('frontend/publish.cobro');
    }

}
