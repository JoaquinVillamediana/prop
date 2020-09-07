<?php

namespace App\Http\Controllers;

use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\Properties_typeModel;
use App\Models\CurrencyModel;
use App\Models\LocalitiesModel;
//Cmabiar de controlador
use App\Models\FavoritesModel;
use App\Models\LuxuriesModel;
use App\Models\ServicesModel;
use App\Models\AmbientsModel;
use App\Models\PropertiesLuxuriesModel;
use App\Models\PropertiesAmbientsModel;
use App\Models\PropertiesServicesModel;
//
use DB;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        
        $aLocalities = LocalitiesModel::get();
        $aProperties = PropertiesModel::select('properties.*','currency.symbol')
        ->leftjoin('currency','currency.id','=','properties.currency_id')
        ->paginate(9);
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Properties_typeModel::where('properties_type.visible' ,'=', '1')
        ->get();
            
    

        return view('frontend/home.index',compact('aProperties','aOperationType','aPropietie_type','aLocalities'));
        
    }

    public function propietie($id)
    {

        $oProp = PropertiesModel::select('properties.*','users.name as user_name','users.id as user_id','users.type as user_type','users.phone as user_phone','currency.symbol','users.profile_image as profile_image')
        ->leftjoin('users','properties.user_id','users.id')
        ->leftjoin('currency','properties.currency_id','currency.id')
        ->whereNull('properties.deleted_at')
        ->where('properties.visible','=','1')
        ->where('properties.id',$id)
        ->groupBy('properties.id')
        ->first();

        views($oProp)->record();


   $aProperties_luxuries=DB::select('SELECT pc.*,(c.name) comodidades_name
    FROM properties_luxuries pc
   LEFT JOIN luxuries c ON pc.luxuries_id = c.id
   where pc.deleted_at is null
   and pc.properties_id = "'.$id.'"
   GROUP BY pc.id;
    ');

    $aProperties_general_characteristics=DB::select('SELECT pcg.*,(cg.name) caracteristicas_generales_name
    FROM properties_general_characteristics pcg
    LEFT JOIN general_characteristics cg ON pcg.general_characteristics_id = cg.id
    where pcg.deleted_at is null
    and pcg.properties_id = "'.$id.'"
    GROUP BY pcg.id;
    ');

    $aProperties_ambients=DB::select('SELECT pa.*,(a.name) ambientes_name
    FROM properties_ambients pa
    LEFT JOIN ambients a ON pa.ambients_id = a.id
    where pa.deleted_at is null
    and pa.properties_id = "'.$id.'"
    GROUP BY pa.id;
     ');

     $aProperties_services=DB::select('SELECT ps.*,(s.name) service_name
    FROM properties_services ps
    LEFT JOIN services s ON ps.services_id = s.id
    where ps.deleted_at is null
    and ps.properties_id = "'.$id.'"
    GROUP BY ps.id;
     ');
     

        return view('frontend/propietie.index',compact('oProp','aProperties_luxuries','aProperties_general_characteristics','aProperties_ambients','aProperties_services'));
        
    }



}
