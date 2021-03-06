<?php

namespace App\Http\Controllers\frontend;

use App\Models\PropertiesModel;

use App\Models\Operation_typeModel;
use App\Models\Properties_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Models\LocalitiesModel;
use App\Models\CurrencyModel;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $aPropietie_type = Properties_typeModel::where('properties_type.visible', '=', '1')
            ->get();

        $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();

        $aLocalities = LocalitiesModel::get();

        $aCurrencies = CurrencyModel::get();

        $oSearch = new  \App\Classes\SearchClass;
        $oSearch->operationType = $request['type'];
        $oSearch->buildingType = $request['building'];
        $oSearch->locality = $request['locality'];
        if($oSearch->operationType == '1')
        {
            $oSearch->currency = 1;
        }
        if($oSearch->operationType == '2')
        {
            $oSearch->currency = 2;
        }
        

        return view('frontend/search.index', compact('aLocalities', 'aOperationType', 'aPropietie_type','aCurrencies', 'oSearch'));
    }



    public function index_avanzado(){
      
        $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES";

    $aProperties=DB::select('SELECT *
    FROM properties
    where deleted_at is null
    and end_at > "'.now().'"
    and visible = 1
    
     ');

     return view('frontend/search.index',compact('aProperties','ubicacion'));
    }


        public function index_compra(){
      
            $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES PARA COMPRAR";
            
            $oSearch = new  \App\Classes\SearchClass;
            $oSearch->operationType = 1;
            $oSearch->currency = 1;
            $aCurrencies = CurrencyModel::get();

            $aLocalities = LocalitiesModel::get();

            $aPropietie_type = Properties_typeModel::where('properties_type.visible', '=', '1')
            ->get();

             $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();

            return view('frontend/search.index',compact('oSearch','aLocalities','aOperationType', 'aPropietie_type','aCurrencies'));
        }

        public function index_alquiler(){
      
            $ubicacion="TODAS LAS PROPIEDADES DIPONIBLES PARA COMPRAR";

            $oSearch = new  \App\Classes\SearchClass;
            $oSearch->operationType = 2;
            $oSearch->currency = 2;
            $aCurrencies = CurrencyModel::get();

            $aLocalities = LocalitiesModel::get();

            $aPropietie_type = Properties_typeModel::where('properties_type.visible', '=', '1')
            ->get();

             $aOperationType = Operation_typeModel::where('operation_type.visible', '=', '1')
            ->get();

            return view('frontend/search.index',compact('oSearch','aLocalities','aOperationType', 'aPropietie_type','aCurrencies'));
            }


    public function getFilterProperties(Request $request)
    {
        $aRequest = $request->all();
        $query = 'SELECT *
        FROM properties
        where deleted_at is null
        and visible = 1
        and end_at > "'.now().'"
        and price >= "'.$request['min_price'].'"
        and price <= "'.$request['max_price'].'"
        and expenses >= "'.$request['min_expenses'].'"
        and expenses <= "'.$request['max_expenses'].'"
        and operation_type_id = "'.$request['operation_type_id'].'"
        and propietie_type_id = "'.$request['propietie_type_id'].'"
        and currency_id = "'.$request['currency'].'"
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
        if(($request['order'] == 'ASC' || $request['order'] == 'DESC') && (($request['order_type'] == 'price' || $request['order_type'] == 'size')))
        {
            $query = $query.' ORDER BY '.$request['order_type'].' '.$request['order'].' , priority DESC';
        }
        else {
            $query = $query.' ORDER BY priority DESC';
        }

        $aProperties = DB::select($query);
        $propNumber = count($aProperties);
        if(!empty($request['pageNumber']))
        {
            $request['pageSize'] = 10;
            $offset = (intval($request['pageNumber']) - 1) * intval($request['pageSize']); 
            
            $aProperties = array_slice($aProperties,$offset, intval($request['pageSize']));
        }

        if($propNumber > 0)
        {
            $query = 'SELECT * from images WHERE deleted_at is null and (';
        foreach ($aProperties as $prop)
        {
            if($prop == $aProperties[0])
            {
                $query = $query.' propietie_id = "'.$prop->id.'"';
            }
            else{
                
            }
            $query = $query.'or propietie_id = "'.$prop->id.'"';
        }
        $query = $query.');';
  
        $aPropImages= DB::select($query);
        }
        else{
            $aPropImages = null;
        }
        


        return response()->json(['aProperties' => $aProperties, 'propNumber' => $propNumber,'aPropImages' => $aPropImages ]);

    }


}
