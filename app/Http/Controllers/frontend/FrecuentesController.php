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
class FrecuentesController extends Controller {

    public function index() {
     
//         $id= Auth::user()->id;
//         $aChats=DB::select('SELECT m.*,(u.name) as nombre_usuario
//         FROM messages m
//         LEFT JOIN users u  ON (m.user_from_id = u.id )
//         where m.deleted_at is null
//         and (m.user_from_id = "'.$id.'" or m.user_to_id = "'.$id.'")
        
//         GROUP BY m.id 
//         ORDER BY m.created_at
//    ');

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
        return view('frontend/frecuent.index');
    }

    public function ayuda(){
        return view('frontend/ayuda.index');
       }

   public function terminos_y_condiciones_de_uso(){
    return view('frontend/condiciones.tycdu');
   }
   public function terminos_y_condiciones_de_contratacion(){
    return view('frontend/condiciones.tycdc');
   }
   public function politica_de_privacidad(){
    return view('frontend/condiciones.pdp');
   }
   public function politica_de_gestion_de_calidad(){
    return view('frontend/condiciones.pdgdc');
   }
   

  




// 



   

}
