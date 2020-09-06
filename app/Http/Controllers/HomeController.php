<?php

namespace App\Http\Controllers;

use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\CurrencyModel;
use App\Models\LocalitiesModel;
//Cmabiar de controlador
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
        $aPropieties = PropietiesModel::select('propieties.*','currency.symbol')
        ->leftjoin('currency','currency.id','=','propieties.currency_id')
        ->paginate(9);
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();
            
        return view('frontend/home.index',compact('aPropieties','aOperationType','aPropietie_type','aLocalities'));
        
    }

    public function propietie($id)
    {

        $oProp = PropietiesModel::select('propieties.*','users.name as user_name','users.id as user_id','users.type as user_type','users.phone as user_phone','currency.symbol','users.profile_image as profile_image')
        ->leftjoin('users','propieties.user_id','users.id')
        ->leftjoin('currency','propieties.currency_id','currency.id')
        ->whereNull('propieties.deleted_at')
        ->where('propieties.visible','=','1')
        ->where('propieties.id',$id)
        ->groupBy('propieties.id')
        ->first();

        views($oProp)->record();


   $aPropieties_comodidades=DB::select('SELECT pc.*,(c.name) comodidades_name
    FROM propieties_comodidades pc
   LEFT JOIN comodidades c ON pc.comodidades_id = c.id
   where pc.deleted_at is null
   and pc.propietie_id = "'.$id.'"
   GROUP BY pc.id;
    ');

    $aPropieties_caracteristicas_generales=DB::select('SELECT pcg.*,(cg.name) caracteristicas_generales_name
    FROM propieties_caracteristicas_generales pcg
    LEFT JOIN caracteristicas_generales cg ON pcg.caracteristicas_generales_id = cg.id
    where pcg.deleted_at is null
    and pcg.propietie_id = "'.$id.'"
    GROUP BY pcg.id;
    ');

    $aPropieties_ambientes=DB::select('SELECT pa.*,(a.name) ambientes_name
    FROM propieties_ambientes pa
    LEFT JOIN ambientes a ON pa.ambientes_id = a.id
    where pa.deleted_at is null
    and pa.propietie_id = "'.$id.'"
    GROUP BY pa.id;
     ');

     $aPropieties_services=DB::select('SELECT ps.*,(s.name) service_name
    FROM propieties_services ps
    LEFT JOIN services s ON ps.services_id = s.id
    where ps.deleted_at is null
    and ps.propietie_id = "'.$id.'"
    GROUP BY ps.id;
     ');
     

        return view('frontend/propietie.index',compact('oProp','aPropieties_comodidades','aPropieties_caracteristicas_generales','aPropieties_ambientes','aPropieties_services'));
        
    }



}
