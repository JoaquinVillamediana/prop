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
use App\Models\LocalitiesModel;


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

    // publicar
    public function publish_login1() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        $aLocalities = LocalitiesModel::get();
        return view('frontend/publish/personal.publish1',compact('aPropietie_type','aLocalities','aOperationType'));
    }

    public function store1(Request $request){

        $aValidations = array(
            
            
            'locality' => 'required|max:200',
            
            'building' => 'required|numeric'
            
           
        );

        $this->validate($request, $aValidations);
            
        PropietiesModel::create($request->all());         
        $id = PropietiesModel::max('id');
        return redirect()->route('publish_personal_free2' , $id);


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

        $aCurrency = DB::select('SELECT *
         FROM currency
         where deleted_at is null
        ');


        return view('frontend/publish/personal.publish3',compact('aPropietie_type','aCurrency'));
    }


    public function publish_login4() {

        $aAmbientes = DB::select('SELECT *
        FROM ambientes
        where deleted_at is null
       ');

        $aCaracteristocasg = DB::select('SELECT *
        FROM caracteristicas_generales
        where deleted_at is null
       ');

        $aServicios = DB::select('SELECT *
        FROM services
        where deleted_at is null
        ');

        $aComodidades = DB::select('SELECT *
        FROM comodidades
        where deleted_at is null
        ');


        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        return view('frontend/publish/personal.publish4',compact('aPropietie_type','aAmbientes','aCaracteristocasg','aServicios','aComodidades'));
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
