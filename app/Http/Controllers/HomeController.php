<?php

namespace App\Http\Controllers;

use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\LocalitiesModel;
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

        $aProp=DB::select('SELECT p.*,(u.name) user_name,(u.id) user_id,(u.type) user_type,(u.phone) user_phone,(c.name) currency_name,(u.profile_image) profile_image
        FROM propieties p
        LEFT JOIN users u ON p.user_id = u.id
        LEFT JOIN currency c ON p.currency_id = c.id
        where p.deleted_at is null
        and p.visible = 1
        and p.id = "'.$id.'"
        GROUP BY p.id;
   ');

   $aPropieties_comodidades=DB::select('SELECT pc.*,(c.name) comodidades_name
    FROM propieties_comodidades pc
   LEFT JOIN comodidades c ON pc.comidades_id = c.id
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
     

        return view('frontend/propietie.index',compact('aProp','aPropieties_comodidades','aPropieties_caracteristicas_generales','aPropieties_ambientes','aPropieties_services'));
        
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

   $aPropieties_comodidades=DB::select('SELECT pc.*,(c.name) comodidades_name
    FROM propieties_comodidades pc
   LEFT JOIN comodidades c ON pc.comidades_id = c.id
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

     $aPropieteie_user=DB::select('SELECT user_id from propieties where id = "'.$id.'"');
     
  
        return view('frontend/propietie.edit',compact('aProp','aPropieties_comodidades','aPropieties_caracteristicas_generales','aPropieties_ambientes','aPropieties_services'));
        
   
   
        
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            
            'name' => 'required|max:60',
        
           
        );

     

        $this->validate($request, $aValidations);

        $oPropietie = PropietiesModel::find($id);
          
        $request['name'] = ucwords($request['name']);
       

        $oPropietie->name = $request['name'];

        $oPropietie->description = $request['description'];
        $oPropietie->introduccion = $request['introduccion'];
        $oPropietie->price = $request['price'];
        $oPropietie->rooms = $request['rooms'];
        $oPropietie->expensas = $request['expensas'];
        $oPropietie->beedrooms = $request['beedrooms'];
        $oPropietie->bathrooms = $request['bathrooms'];
        $oPropietie->size = $request['size'];
        $oPropietie->direction = $request['direction'];
        $oPropietie->garages = $request['garages'];
        $oPropietie->toilettes = $request['toilettes'];
        $oPropietie->years = $request['years'];
        
        $oPropietie->save();

        return redirect()->back();
    }


}
