<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\Properties_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageModel;
use App\Models\LuxuriesModel;
use App\Models\ServicesModel;
use App\Models\AmbientsModel;
use App\Models\GeneralCharacteristicsModel;
use App\Models\PropertiesLuxuriesModel;
use App\Models\PropertiesAmbientsModel;
use App\Models\PropertiesServicesModel;
use App\Models\LocalitiesModel;
use App\Models\PropertiesGeneralCharacteristicsModel;
use App\Models\CurrencyModel;
use App\Models\UserPlansActivesModel;
use CyrildeWit\EloquentViewable\Support\Period;
use DB; 
use Auth;


class MyPropertiesController extends Controller {

    public function index() {

        
      $user = Auth::user()->id;

      $aProperties = PropertiesModel::select('properties.*','currency.symbol','publish_plans.name as plan_name')
      ->leftjoin('currency','properties.currency_id','currency.id')
      ->leftjoin('publish_plans','properties.plan_id','publish_plans.id')
      ->where('properties.visible','=','1')
      ->where('properties.user_id',$user)
      ->get();

      $aViews = array();
      $totalViews = 0;
      $past24Views = 0;
      $past48Views = 0;
      $pastMonthViews = 0;
      foreach($aProperties as $Property)
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
      LEFT JOIN properties p ON (u.id = p.user_id) 
      where u.deleted_at is null
      and u.id = "'.$user.'"
      and p.visible = 1
      GROUP BY u.id
       ');

       $aPublish=DB::select('SELECT upa.*,COUNT(p.id) countprop, pp.name as plan_name
       FROM user_plans_actives upa
       LEFT JOIN properties p ON (upa.id = p.plan_id) 
       LEFT JOIN publish_plans pp ON (upa.plan_id = pp.id)
       where upa.deleted_at is null
       and upa.user_id = "'.$user.'"
       and p.visible = 1
       GROUP BY upa.id
        ');
        
      return view('frontend/myproperties.index',compact('aProperties','aDatos','aDatosProp','aViews','aPublish'));

    }

    public function edit($id)
    {

      $aLocalities = LocalitiesModel::get();

      $aProp=DB::select('SELECT p.*,(u.name) user_name,(u.id) user_id,(u.type) user_type,(u.phone) user_phone,(c.name) currency_name,(u.profile_image) profile_image,(l.nombre) locality_name 
      FROM properties p
      LEFT JOIN users u ON p.user_id = u.id
      LEFT JOIN currency c ON p.currency_id = c.id
      LEFT JOIN localidades l ON  CAST(p.location_id AS UNSIGNED) = CAST(l.id AS UNSIGNED)
      where p.deleted_at is null
      and p.visible = 1
      and p.id = "'.$id.'"
      ;');


      $aProperties_general_characteristics=DB::select('SELECT general_characteristics.*,properties_general_characteristics.id as characteristic_checked
      FROM propiedades.general_characteristics
      LEFT JOIN properties_general_characteristics ON ( general_characteristics.id = properties_general_characteristics.general_characteristics_id and  properties_general_characteristics.properties_id = "'.$id.'" )
      where general_characteristics.deleted_at is null
      and properties_general_characteristics.deleted_at is null
      ;');

      

      $aProperties_ambients=DB::select('SELECT ambients.*,properties_ambients.id as ambient_checked
      FROM propiedades.ambients
      LEFT JOIN properties_ambients ON ( ambients.id = properties_ambients.ambients_id and  properties_ambients.properties_id = "'.$id.'" )
      where ambients.deleted_at is null
      and properties_ambients.deleted_at is null
      ;');

      $aProperties_services=DB::select('SELECT services.*,properties_services.id as service_checked
      FROM propiedades.services
      LEFT JOIN properties_services ON ( services.id = properties_services.services_id and  properties_services.properties_id = "'.$id.'" )
      where services.deleted_at is null
      and properties_services.deleted_at is null
      ;');

      $aProperties_luxuries=DB::select('SELECT luxuries.*,properties_luxuries.id as luxury_checked
      FROM propiedades.luxuries
      LEFT JOIN properties_luxuries ON ( luxuries.id = properties_luxuries.luxuries_id and  properties_luxuries.properties_id = "'.$id.'" )
      where luxuries.deleted_at is null
      and properties_luxuries.deleted_at is null
      ;');


      
     
      $aCurrencies = CurrencyModel::get();

      if(!empty($aProp)  &&  Auth::user()->id == $aProp[0]->user_id)
      {
        return view('frontend/myproperties.edit',compact('aLocalities','aProp','aProperties_luxuries','aProperties_general_characteristics','aProperties_ambients','aProperties_services','aCurrencies'));

      }
      else
      {
        return view('frontend/myproperties.edit',compact('aProp','aProperties_luxuries','aProperties_general_characteristics','aProperties_ambients','aProperties_services','aCurrencies'));

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
          'rooms' => 'required|numeric|max:30',
          'bedrooms' => 'required|numeric|max:20',
          'bathrooms' => 'required|numeric|max:20',
          'size' => 'required|numeric|max:2000000',
          'antiquity' => 'required|numeric|max:100',
          'locality' => 'required|numeric'
      );


      $this->validate($request, $aValidations);

      $oProperties = PropertiesModel::where('id',$id)->first();
        
      $request['name'] = ucwords($request['name']);

      $oProperties->name = $request['name'];
      $oProperties->currency_id = $request['currency'];
      $oProperties->price = $request['price'];
      $oProperties->expenses = $request['expenses'];
      $oProperties->introduction = $request['introduction'];
      $oProperties->description = $request['description'];
      $oProperties->rooms = $request['rooms'];
      $oProperties->bedrooms = $request['bedrooms'];
      $oProperties->bathrooms = $request['bathrooms'];
      $oProperties->size = $request['size'];
      $oProperties->direction = $request['address'];
      $oProperties->years = $request['antiquity'];
      $oProperties->location_id = $request['locality'];

      $oProperties->save();

      PropertiesAmbientsModel::where('properties_id',$id)->forceDelete();
      PropertiesLuxuriesModel::where('properties_id',$id)->forceDelete();
      PropertiesServicesModel::where('properties_id',$id)->forceDelete();
      PropertiesGeneralCharacteristicsModel::where('properties_id',$id)->forceDelete();
      

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
              $PropAmbient->properties_id = $id;
              $PropAmbient->ambients_id = $ambient->id;
              $PropAmbient->save();
          }
      }

      foreach($aProperties_services as $services)
      {   
          $request_name = 'service-'.$services->id;
          if(!empty($request[$request_name]))
          {
              $PropService = new PropertiesServicesModel;
              $PropService->properties_id = $id;
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
              $PropLuxury->properties_id = $id;
              $PropLuxury->luxuries_id = $luxury->id;
              $PropLuxury->save();
          }
      }

      foreach($aProperties_general_characteristics as $characteristic)
      {   
          $request_name = 'characteristic-'.$characteristic->id;
          if(!empty($request[$request_name]))
          {
              $PropCharacteristic = new PropertiesGeneralCharacteristicsModel;
              $PropCharacteristic->properties_id = $id;
              $PropCharacteristic->general_characteristics_id = $characteristic->id;
              $PropCharacteristic->save();
          }
      }
      
      

      return redirect()->route('mis_propiedades.index');
  }

  public function show($id) {
    //
}

  public function edit_photos($id)
  { 
    $propietie_id = $id;
    $aImages = ImageModel::select('images.*','properties.name as prop_name')
    ->leftjoin('properties','images.propietie_id','properties.id')
    ->where('propietie_id',$id)
    ->get();
    return view('frontend/myproperties.image',compact('aImages','propietie_id'));
  }

  public function user_plans()
  {
    $user = Auth::user()->id;
    $aPlans=UserPlansActivesModel::select('user_plans_actives.*','publish_plans.name as plans_name','publish_plans.price as plans_price')
    ->leftjoin('publish_plans','user_plans_actives.plan_id','publish_plans.id')
    ->where('user_id',$user)
    ->get();
    return view('frontend/myproperties.active_plans',compact('aPlans'));
  }

}
