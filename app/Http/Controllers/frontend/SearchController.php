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


        $ubicacion =  $request['text'];

        $locality = $request['locality'];

        $operationtype =  $request['type'];
        $propietie_type =  $request['building'];




        $aPropietie_type_name = DB::select('SELECT name
        FROM propietie_type
        where id = "' . $propietie_type . '" '
        );

        $aOperationType_name = DB::select('SELECT name
        FROM operation_type
        where id = "' . $operationtype . '"
        ');

        $aPropieties = DB::select('SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and location_id = "' . $locality . '"
        and operation_type_id = "' . $operationtype . '"
        and propietie_type_id = "' . $propietie_type . '"
        ');
        // $aUsers = User::get();
        // $aPropieties = PropietiesModel::get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible', '=', '1')
            ->get();

        $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();



            $aLocalities = LocalitiesModel::get();

        if (isset($request['cantidad_ambientes_1'])) {
            $ambientes =  $request['cantidad_ambientes_1'];

            $aPropieties = DB::select('SELECT *
            FROM propieties
            where deleted_at is null
            and visible = 1
            and rooms = "' . $ambientes . '"
             ');

            return view('frontend/search.index', compact('aLocalities','aPropieties', 'aOperationType', 'aPropietie_type', 'ubicacion', 'aOperationType_name', 'aPropietie_type_name'));
        }





        return view('frontend/search.index', compact('aLocalities','aPropieties', 'aOperationType', 'aPropietie_type', 'ubicacion', 'aOperationType_name', 'aPropietie_type_name'));
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

        $aPropieties=DB::select('SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and operation_type_id = 1
         ');

         return view('frontend/search.index',compact('aPropieties','ubicacion'));
        }

        public function index_alquiler(){
      
            $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES PARA ALQUILAR";

            $aPropieties=DB::select('SELECT *
            FROM propieties
            where deleted_at is null
            and visible = 1
            and operation_type_id = 2
             ');
    
             return view('frontend/search.index',compact('aPropieties','ubicacion'));
            }


           
            
    public function index_personalizado(Request $request)
    {


        $ambientes =  $request['cantidad_ambientes_1'];

        $aPropieties = DB::select('SELECT *
        FROM propieties
        where deleted_at is null
        and visible = 1
        and rooms = "' . $ambientes . '"
         ');

        return view('frontend/search.index', compact('aPropieties'));
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
