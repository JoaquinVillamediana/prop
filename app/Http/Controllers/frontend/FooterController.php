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
class FooterController extends Controller {

    public function index() {
     
    return view('frontend/footer.frecuent_questions');
    }

   public function terminos_y_condiciones_de_uso(){
    return view('frontend/footer.tycdu');
   }
   public function terminos_y_condiciones_de_contratacion(){
    return view('frontend/footer.tycdc');
   }
   public function politica_de_privacidad(){
    return view('frontend/footer.pdp');
   }
   public function politica_de_gestion_de_calidad(){
    return view('frontend/footer.pdgdc');
   }
   public function ayuda(){
    return view('frontend/footer.help');
   }
   public function publish_questions(){
    return view('frontend/footer.publish_questions');
   }
   

  




// 



   

}
