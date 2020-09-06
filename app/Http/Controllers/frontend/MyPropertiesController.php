<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LuxuriesModel;
use App\Models\ServicesModel;
use App\Models\AmbientsModel;
use App\Models\GeneralCharacteristicsModel;
use App\Models\PropertiesLuxuriesModel;
use App\Models\PropertiesAmbientsModel;
use App\Models\PropertiesServicesModel;
use App\Models\PropertiesGeneralCharacteristicsModel;
use App\Models\CurrencyModel;
use CyrildeWit\EloquentViewable\Support\Period;
use DB; 
use Auth;


class MyPropertiesController extends Controller {

    public function index() {

        
      $user = Auth::user()->id;

      $aPropieties = PropietiesModel::select('propieties.*','currency.symbol')
      ->leftjoin('currency','propieties.currency_id','currency.id')
      ->where('propieties.visible','=','1')
      ->where('propieties.user_id',$user)
      ->get();

      $aViews = array();
      $totalViews = 0;
      $past24Views = 0;
      $past48Views = 0;
      $pastMonthViews = 0;
      foreach($aPropieties as $Property)
      {
        $aViews['Property-'.$Property->id] = views($Property)->count();
        $totalViews += views($Property)->count();
        $past24Views += views($Property)->period(Period::pastDays(1))->count();
        $past48Views += views($Property)->period(Period::pastDays(2))->count();
        $pastMonthViews += views($Property)->period(Period::pastMonths(1))->count();
      }

      $aViews['totalViews'] = $totalViews;
      $aViews['past24Views'] = $past24Views;
      $aViews['past48Views'] = $past48Views;
      $aViews['pastMonthViews'] = $pastMonthViews;

      $aDatos=DB::select('SELECT u.*,COUNT(m.id) count_contactados
      FROM users u
      LEFT JOIN messages m ON (u.id = m.user_from_id) 
      where u.deleted_at is null
      and u.id = "'.$user.'"
      GROUP BY u.id
       ');

       $aDatosProp=DB::select('SELECT u.*,COUNT(p.id) countprop
      FROM users u
      LEFT JOIN propieties p ON (u.id = p.user_id) 
      where u.deleted_at is null
      and u.id = "'.$user.'"
      and p.visible = 1
      GROUP BY u.id
       ');
        
      return view('frontend/myproperties.index',compact('aPropieties','aDatos','aDatosProp','aViews'));

    }

    public function edit($id)
    {

      $aProp=DB::select('SELECT p.*,(u.name) user_name,(u.id) user_id,(u.type) user_type,(u.phone) user_phone,(c.name) currency_name,(u.profile_image) profile_image
      FROM propieties p
      LEFT JOIN users u ON p.user_id = u.id
      LEFT JOIN currency c ON p.currency_id = c.id
      where p.deleted_at is null
      and p.visible = 1
      and p.id = "'.$id.'"
      GROUP BY p.id
      ;');

      $aPropieties_general_characteristics=DB::select('SELECT caracteristicas_generales.*,propieties_caracteristicas_generales.id as characteristic_checked
      FROM propiedades.caracteristicas_generales
      LEFT JOIN propieties_caracteristicas_generales ON ( caracteristicas_generales.id = propieties_caracteristicas_generales.caracteristicas_generales_id and  propieties_caracteristicas_generales.propietie_id = "'.$id.'" )
      where caracteristicas_generales.deleted_at is null
      and propieties_caracteristicas_generales.deleted_at is null
      ;');

      $aPropieties_ambientes=DB::select('SELECT ambientes.*,propieties_ambientes.id as ambient_checked
      FROM propiedades.ambientes
      LEFT JOIN propieties_ambientes ON ( ambientes.id = propieties_ambientes.ambientes_id and  propieties_ambientes.propietie_id = "'.$id.'" )
      where ambientes.deleted_at is null
      and propieties_ambientes.deleted_at is null
      ;');

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


      
     
      $aCurrencies = CurrencyModel::get();

      if(!empty($aProp)  &&  Auth::user()->id == $aProp[0]->user_id)
      {
        return view('frontend/myproperties.edit',compact('aProp','aPropieties_luxuries','aPropieties_general_characteristics','aPropieties_ambientes','aPropieties_services','aCurrencies'));

      }
      else
      {
        return redirect()->route('home');
      }
     
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
      $oProperties->years = $request['antiquity'];

      $oProperties->save();

      PropertiesAmbientsModel::where('propietie_id',$id)->forceDelete();
      PropertiesLuxuriesModel::where('propietie_id',$id)->forceDelete();
      PropertiesServicesModel::where('propietie_id',$id)->forceDelete();
      PropertiesGeneralCharacteristicsModel::where('propietie_id',$id)->forceDelete();
      

      $aProperties_ambients = AmbientsModel::get();
      $aProperties_services = ServicesModel::get();
      $aProperties_luxuries = LuxuriesModel::get();
      $aProperties_general_characteristics = GeneralCharacteristicsModel::get();

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

      foreach($aProperties_general_characteristics as $characteristic)
      {   
          $request_name = 'characteristic-'.$characteristic->id;
          if(!empty($request[$request_name]))
          {
              $PropCharacteristic = new PropertiesGeneralCharacteristicsModel;
              $PropCharacteristic->propietie_id = $id;
              $PropCharacteristic->caracteristicas_generales_id = $characteristic->id;
              $PropCharacteristic->save();
          }
      }
      
      

      return redirect()->route('mis_propiedades.index');
  }

  public function show($id) {
    //
}

  

}
