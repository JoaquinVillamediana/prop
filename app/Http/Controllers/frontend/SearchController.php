<?php

namespace App\Http\Controllers\frontend;

use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Models\LocalitiesModel;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $default_locality = $request['locality'];

        $default_type  =  $request['type'];
        $default_property =  $request['building'];

        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible', '=', '1')
            ->get();

        $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();

        $aLocalities = LocalitiesModel::get();


        return view('frontend/search.index', compact('aLocalities', 'aOperationType', 'aPropietie_type', 'default_type','default_property','default_locality'));
    }



    public function index_avanzado(){
      
        $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES";

    $aPropieties=DB::select('SELECT *
    FROM propieties
    where deleted_at is null
    and visible = 1
    
     ');

     return view('frontend/search.index',compact('aPropieties','ubicacion'));
    }


        public function index_compra(){
      
            $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES PARA COMPRAR";
            $default_type = 1;
            $aLocalities = LocalitiesModel::get();

            $aPropietie_type = Propietie_typeModel::where('propietie_type.visible', '=', '1')
            ->get();

             $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();

            return view('frontend/search.index',compact('default_type','aLocalities','aOperationType', 'aPropietie_type'));
        }

        public function index_alquiler(){
      
            $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES PARA COMPRAR";
            $default_type = 2;
            $aLocalities = LocalitiesModel::get();

            $aPropietie_type = Propietie_typeModel::where('propietie_type.visible', '=', '1')
            ->get();

             $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();

            return view('frontend/search.index',compact('default_type','aLocalities','aOperationType', 'aPropietie_type'));
            }


    public function getFilterProperties(Request $request)
    {
        $aRequest = $request->all();
        $query = 'SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and price > "'.$request['min_price'].'"
        and price < "'.$request['max_price'].'"
        and operation_type_id = "'.$request['operation_type_id'].'"
        and propietie_type_id = "'.$request['propietie_type_id'].'"
        ';
        
        if(!empty($request['rooms']))
        {
            $query = $query.' and rooms = "'.$request['rooms'].'"';
        }
        if(!empty($request['bedrooms']))
        {
            $query = $query.' and bedrooms = "'.$request['bedrooms'].'"';
        }
        if(!empty($request['locality']))
        {
            $query = $query.' and location_id = "'.$request['locality'].'"';
        }
        if($request['order'] == 'ASC' || $request['order'] == 'DESC')
        {
            $query = $query.' ORDER BY price '.$request['order'].'';
        }
        $aPropieties = DB::select($query);

        return json_encode($aPropieties);
    }
}
