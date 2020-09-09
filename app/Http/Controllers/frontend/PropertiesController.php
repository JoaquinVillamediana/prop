<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\ImageModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; 

use Auth;
use Hash;

class PropertiesController extends Controller {

    public function index(){
        
    }

    public function show($id)
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


      
        $aImage = ImageModel::where('propietie_id', '=', $id)
        ->get();


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
     

        return view('frontend/propietie.index',compact('oProp','aProperties_luxuries','aProperties_general_characteristics','aProperties_ambients','aProperties_services','aImage'));
        
    }

    public function userProperties() {

        
        $user=Auth::user()->id;


        $aProperties = PropertiesModel::select('properties.*','currency.symbol')
        ->leftjoin('currency','properties.currency_id','currency.id')
        ->where('properties.visible','=','1')
        ->where('properties.user_id',$user)
        ->whereNull('currency.deleted_at')
        ->get();

        $totalViews = 0;

        foreach($aProperties as $Property)
        {
            $totalViews += views($Property)->count();
        }

        $aDatos=DB::select('SELECT u.*,COUNT(m.id) count_contactados
        FROM users u
        LEFT JOIN messages m ON (u.id = m.user_from_id) 
        where u.deleted_at is null
        and u.id = "'.$user.'"
        GROUP BY u.id
         ');

         $aDatosProp=DB::select('SELECT u.*,COUNT(p.id) countprop
        FROM users u
        LEFT JOIN properties p ON (u.id = p.user_id) 
        where u.deleted_at is null
        and u.id = "'.$user.'"
        and p.visible = 1
        GROUP BY u.id
         ');
        
   return view('frontend/properties.index',compact('aProperties','aDatos','aDatosProp','totalViews'));

    }

  

}
