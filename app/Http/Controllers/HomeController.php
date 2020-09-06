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


    public function edit_propietie($id)
    {

        $aProp=DB::select('SELECT p.*,(u.name) user_name,(u.id) user_id,(u.type) user_type,(u.phone) user_phone,(c.name) currency_name,(u.profile_image) profile_image
        FROM propieties p
        LEFT JOIN users u ON p.user_id = u.id
        LEFT JOIN currency c ON p.currency_id = c.id
        where p.deleted_at is null
        and p.visible = 1
        and p.id = "'.$id.'"
        GROUP BY p.id;
   ');

   

    $aPropieties_caracteristicas_generales=DB::select('SELECT pcg.*,(cg.name) caracteristicas_generales_name
    FROM propieties_caracteristicas_generales pcg
    LEFT JOIN caracteristicas_generales cg ON pcg.caracteristicas_generales_id = cg.id
    where pcg.deleted_at is null
    and pcg.propietie_id = "'.$id.'"
    GROUP BY pcg.id;
    ');

    $aPropieties_ambientes=DB::select('SELECT ambientes.*,propieties_ambientes.id as ambient_checked
    FROM propiedades.ambientes
    LEFT JOIN propieties_ambientes ON ( ambientes.id = propieties_ambientes.ambientes_id and  propieties_ambientes.propietie_id = "'.$id.'" )
    where ambientes.deleted_at is null
    and propieties_ambientes.deleted_at is null;
     ');

    $aPropieties_services=DB::select('SELECT services.*,propieties_services.id as service_checked
    FROM propiedades.services
    LEFT JOIN propieties_services ON ( services.id = propieties_services.services_id and  propieties_services.propietie_id = "'.$id.'" )
    where services.deleted_at is null
    and propieties_services.deleted_at is null
    ;');

    $aPropieties_luxuries=DB::select('SELECT comodidades.*,propieties_comodidades.id as luxury_checked
    FROM propiedades.comodidades
    LEFT JOIN propieties_comodidades ON ( comodidades.id = propieties_comodidades.comodidades_id and  propieties_comodidades.propietie_id = "'.$id.'" )
    where comodidades.deleted_at is null
    and propieties_comodidades.deleted_at is null
    ;');

     $aPropieteie_user=DB::select('SELECT user_id from propieties where id = "'.$id.'"');
     
     $aCurrencies = CurrencyModel::get();
  
        return view('frontend/propietie.edit',compact('aProp','aPropieties_luxuries','aPropieties_caracteristicas_generales','aPropieties_ambientes','aPropieties_services','aCurrencies'));
        
   
   
        
    }

    public function update(Request $request, $id) {
        

        $aValidations = array(
            'name' => 'required|max:60',
            'currency' => 'required|numeric',
            'price' => 'required|numeric|max:10000000',
            'expenses' => 'required|numeric|max:100000',
            'introduction' => 'required|max:60',
            'description' => 'required|max:255',
            'address' => 'required|max:100',
            'rooms' => 'required|numeric|max:10',
            'bedrooms' => 'required|numeric|max:10',
            'bathrooms' => 'required|numeric|max:10',
            'size' => 'required|numeric|max:60',
            'antiquity' => 'required|numeric|max:6'
        );


        $this->validate($request, $aValidations);

        $oProperties = PropietiesModel::where('id',$id)->first();
          
        $request['name'] = ucwords($request['name']);

        $oProperties->name = $request['name'];
        $oProperties->currency_id = $request['currency'];
        $oProperties->price = $request['price'];
        $oProperties->expensas = $request['expenses'];
        $oProperties->introduccion = $request['introduction'];
        $oProperties->description = $request['description'];
        $oProperties->rooms = $request['rooms'];
        $oProperties->bedrooms = $request['bedrooms'];
        $oProperties->bathrooms = $request['bathrooms'];
        $oProperties->size = $request['size'];
        $oProperties->direction = $request['address'];
        // $oPropietie->garages = $request['garages'];
        // $oPropietie->toilettes = $request['toilettes'];
        $oProperties->years = $request['antiquity'];

        $oProperties->save();

        PropertiesAmbientsModel::where('propietie_id',$id)->forceDelete();
        PropertiesLuxuriesModel::where('propietie_id',$id)->forceDelete();
        PropertiesServicesModel::where('propietie_id',$id)->forceDelete();

        $aProperties_ambients = AmbientsModel::get();
        $aProperties_services = ServicesModel::get();
        $aProperties_luxuries = LuxuriesModel::get();

        foreach($aProperties_ambients as $ambient)
        {   
            $request_name = 'ambient-'.$ambient->id;
            if(!empty($request[$request_name]))
            {
                $PropAmbient = new PropertiesAmbientsModel;
                $PropAmbient->propietie_id = $id;
                $PropAmbient->ambientes_id = $ambient->id;
                $PropAmbient->save();
            }
        }

        foreach($aProperties_services as $services)
        {   
            $request_name = 'service-'.$services->id;
            if(!empty($request[$request_name]))
            {
                $PropService = new PropertiesServicesModel;
                $PropService->propietie_id = $id;
                $PropService->services_id = $services->id;
                $PropService->save();
            }
        }

        foreach($aProperties_luxuries as $luxury)
        {   
            $request_name = 'luxury-'.$luxury->id;
            if(!empty($request[$request_name]))
            {
                $PropLuxury = new PropertiesLuxuriesModel;
                $PropLuxury->propietie_id = $id;
                $PropLuxury->comodidades_id = $luxury->id;
                $PropLuxury->save();
            }
        }
        
        

        return redirect()->route('user_propieties');
    }


}
