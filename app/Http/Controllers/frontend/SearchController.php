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

    public function index(Request $request) {

        
        $ubicacion =  $request['text'];
      
        $locality= $request['locality'];

        $operationtype =  $request['type'];
        $propietie_type =  $request['building'];
        
     
        

        $aPropietie_type_name=DB::select('SELECT name
        FROM propietie_type
        where 
         id = "'.$propietie_type.'" ');

   $aOperationType_name=DB::select('SELECT name
   FROM operation_type
   where id = "'.$operationtype.'"
');

        $aPropieties=DB::select('SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and location_id = "'.$locality.'"
        and operation_type_id = "'.$operationtype.'"
        and propietie_type_id = "'.$propietie_type.'"
   ');
        // $aUsers = User::get();
        // $aPropieties = PropietiesModel::get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();
        
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();



    
        
        if(isset($request['cantidad_ambientes_1'])){
            $ambientes =  $request['cantidad_ambientes_1'];
      
            $aPropieties=DB::select('SELECT *
            FROM propieties
            where deleted_at is null
            and visible = 1
            and rooms = "'.$ambientes.'"
             ');
            
             return view('frontend/search.index',compact('aPropieties','aOperationType','aPropietie_type','ubicacion','aOperationType_name','aPropietie_type_name'));

        }





        return view('frontend/search.index',compact('aPropieties','aOperationType','aPropietie_type','ubicacion','aOperationType_name','aPropietie_type_name'));
    
    
    
    
    
    }

        public function index_personalizado(Request $request){
           
            
        $ambientes =  $request['cantidad_ambientes_1'];
      
        $aPropieties=DB::select('SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and rooms = "'.$ambientes.'"
         ');

         return view('frontend/search.index',compact('aPropieties'));
        }
  

}
