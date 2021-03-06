<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\UserPlansActivesModel;
use App\Models\Properties_typeModel;
use App\Models\PlansModel;
use App\Models\ImageModel;
use App\Models\LocalitiesModel;
use App\Models\LuxuriesModel;
use App\Models\ServicesModel;
use App\Models\AmbientsModel;
use App\Models\GeneralCharacteristicsModel;
use App\Models\PropertiesGeneralCharacteristicsModel;
use App\Models\PropertiesLuxuriesModel;
use App\Models\PropertiesAmbientsModel;
use App\Models\PropertiesServicesModel;
use App\Models\RenovationsModel;


class PublishController extends Controller {

    public function index() {

       
        return view('frontend/publish.index');
    }

    public function personal() {

        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and user_type = 2
        ');

        return view('frontend/publish.personal',compact('aPlans'));
            
    }
    
    public function profesional() {

        
        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and user_type = 3
        ');

        return view('frontend/publish.profesional',compact('aPlans'));

    }

    // publicar
    public function publish_propertie() {

        if(empty(Auth::user()->id)){
         return redirect()->route('login');

        }


        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Properties_typeModel::where('properties_type.visible' ,'=', '1')
        ->get();

        $aCurrencies = DB::select('SELECT *
         FROM currency
         where deleted_at is null
        ');

        $aPropieties_ambientes = DB::select('SELECT *
        FROM ambients
        where deleted_at is null
        ');

        $aPropieties_general_characteristics = DB::select('SELECT *
        FROM general_characteristics
        where deleted_at is null
        ');

        $aPropieties_services = DB::select('SELECT *
        FROM services
        where deleted_at is null
        ');

        $aPropieties_luxuries = DB::select('SELECT *
        FROM luxuries
        where deleted_at is null
        ');

        $plan2 = 9;

        $aLocalities = LocalitiesModel::get();


        return view('frontend/publish/create.publish_dates',compact('aPropietie_type','aLocalities','aOperationType','aCurrencies','aPropieties_ambientes','aPropieties_general_characteristics','aPropieties_services','aPropieties_luxuries'));
    }

    public function store_dates(Request $request){

         $user= Auth::user()->id;

        $aValidations = array(
            
           
            'name' => 'required|max:60',
            'currency' => 'required|numeric',
            'price' => 'required|numeric|max:10000000',
            'expenses' => 'required|numeric|max:100000',
            'introduction' => 'required|max:60',
            'description' => 'required|max:2000',
            'address' => 'required|max:100',
            'rooms' => 'required|numeric|max:30',
            'bedrooms' => 'required|numeric|max:20',
            'bathrooms' => 'required|numeric|max:20',
            'size' => 'required|numeric|max:2000000',
            'antiquity' => 'required|numeric|max:100',
            
            
            
            
        );

        $this->validate($request, $aValidations);
         
        // $user_plan_id = $request['user_plan_id'];

        // $oPayment = UserPlansActivesModel::where('id',$user_plan_id)->first();

        if(empty(Auth::user()->id))
        {
            return redirect()->route('login');
        }

        // $PropertiesWithSamePlan = PropertiesModel::where('user_plan_id',$user_plan_id)->count();


        // if((intval($oPayment->add_quantity) - intval($PropertiesWithSamePlan)) < 1)
        // {
        //     return redirect()->route('home');
        // }

        // $oPlan = PlansModel::where('id',$oPayment->plan_id)->first();

        $request['name'] = ucwords($request['name']);
        $name = $request['name'];
        $currency_id = $request['currency'];
        $price = $request['price'];
        
        
        $introduccion = $request['introduction'];
        $description = $request['description'];
        $rooms = $request['rooms'];
        $bedrooms = $request['bedrooms'];
        $bathrooms = $request['bathrooms'];
        $size = $request['size'];
        $direction = $request['address'];
        $years = $request['antiquity'];
        $operation_type_id = $request['operation_type'];
        $propietie_type_id = $request['propietie_type'];
        $location_id = $request['locality'];
        $direction =$request['address'];

        if(!empty($request['expenses'])){
            $expensas =  $request['expenses'];
        }
        else{
            $expensas = 0;
        }
 
        
        $data = array('operation_type_id' => $operation_type_id,'propietie_type_id' => $propietie_type_id,'location_id' => $location_id,'user_id' => $user,'direction' => $direction,
        'name' => $name,'introduction' => $introduccion,'description' => $description,'currency_id' => $currency_id,'price' => $price,'expenses' => $expensas,'rooms' => $rooms,
        'bedrooms' => $bedrooms,'bathrooms' => $bathrooms,'years' => $years,'size' => $size,'plan_id' => 1,'user_plan_id' => 9,'priority' => 2 ,'end_at' => now());

        PropertiesModel::insert($data);
        $propietie_id = PropertiesModel::max('id');

        PropertiesAmbientsModel::where('properties_id',$propietie_id)->forceDelete();
        PropertiesLuxuriesModel::where('properties_id',$propietie_id)->forceDelete();
        PropertiesServicesModel::where('properties_id',$propietie_id)->forceDelete();
        PropertiesGeneralCharacteristicsModel::where('properties_id',$propietie_id)->forceDelete();
        
  
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
                $PropAmbient->properties_id = $propietie_id;
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
                $PropService->properties_id = $propietie_id;
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
                $PropLuxury->properties_id = $propietie_id;
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
                $PropCharacteristic->properties_id = $propietie_id;
                $PropCharacteristic->general_characteristics_id = $characteristic->id;
                $PropCharacteristic->save();
            }
        }


      
        
         
         return redirect()->route('publish_files', $propietie_id);
     

    }

         public function publish_files($propietie_id) {

        $aImages = ImageModel::select('images.*','properties.name as propietie_name')
        ->leftjoin('properties','properties.id','=','images.propietie_id')
        ->where('propietie_id','=',$propietie_id)
        ->get();



         return view('frontend/publish/create.publish_files',compact('aImages'))->with('propietie_id',$propietie_id);
     }

    public function store_files(Request $request)
    {

        if(!empty($request['image']))
        {
            $aValidations = array(
                'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif'
            );               
        }
        else
        {
            $aValidations = array(
                'video' => 'required|max:10240|mimes:jpeg,png,jpg,gif'
            ); 
        }

        

        $this->validate($request , $aValidations);

        if (!empty($request['image'] || !empty($request['video']) )) {
            
            if(!empty($request['image']))
            {
            $image = $request['image'];   
            $type = 0;             
            }
            else
            {
                $image = $request['video'];  
                $type = 1;
            }
            
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            
            $propietie_id = $request['propietie_id'];
            $destinationPath = 'images/publish';
            $image->move($destinationPath, $storeImageName);

            $dataxd=array('image' => $storeImageName,'propietie_id' => $propietie_id,'type' => $type,'main_image' => 1);
            ImageModel::insert($dataxd);
             $image_id = ImageModel::max('id');
             $aImages = ImageModel::where('propietie_id','=',$request['propietie_id'])
            ->get();

             foreach($aImages as $image)
            {
                 if($image->id != $image_id)
                {
                   if($image->main_image == 1)
                    {
                         $image->main_image = 0;
                         $image->save();
                     }
                 }

            }

            
            
        return redirect()->route('publish_files',$propietie_id);
            
        }
     
    }

    public function pago_completado(Request $request){
        
        $oPayment = new UserPlansActivesModel();
        if($request['collection_status'] == 'approved')
        {
        $external_reference = UserPlansActivesModel::where('user_id',Auth::user()->id)->count();
        $external_reference = $external_reference.'-'.Auth::user()->id;
        $aPlans = PlansModel::get();

        foreach( $aPlans as $plan )
        {
            $reference_search = md5($external_reference.'-'.$plan->id);
            if($reference_search == $request['external_reference'])
            {
                $oPayment->plan_id = $plan->id;
                $oPayment->add_quantity = $plan->num_add;
                $oPayment->expiration_at = date('Y-m-d', strtotime(now(). ' + 30 days'));
            }
        }

        if(empty($oPayment->plan_id))
        {
            echo("Se ha producido un problema con tu pago, por favor comunicate con soporte@tuproximaprop.com");die;
        }

        
        $oPayment->pay_id_mp = $request['collection_id'];
        $oPayment->user_id = Auth::user()->id;
        $oPayment->save();

            
        }
        
        return redirect()->route('mis_propiedades.index');
    }


   

    public function deleteImage($id)
    {
        ImageModel::find($id)->delete();
        return redirect()->back();
    }


    public function store_files2(Request $request)
    {

        if(!empty($request['image']))
        {
            $aValidations = array(
                'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif'
            );               
        }
        else
        {
            $aValidations = array(
                'video' => 'required|max:10240|mimes:jpeg,png,jpg,gif'
            ); 
        }

        

        $this->validate($request , $aValidations);

        if (!empty($request['image'] || !empty($request['video']) )) {
            
            if(!empty($request['image']))
            {
            $image = $request['image'];   
            $type = 0;             
            }
            else
            {
                $image = $request['video'];  
                $type = 1;
            }
            
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            
            $propietie_id = $request['propietie_id'];
            $destinationPath = 'images/publish';
            $image->move($destinationPath, $storeImageName);

            $dataxd=array('image' => $storeImageName,'propietie_id' => $propietie_id,'type' => $type,'main_image' => 1);
            ImageModel::insert($dataxd);
             $image_id = ImageModel::max('id');
             $aImages = ImageModel::where('propietie_id','=',$request['propietie_id'])
            ->get();

             foreach($aImages as $image)
            {
                 if($image->id != $image_id)
                {
                   if($image->main_image == 1)
                    {
                         $image->main_image = 0;
                         $image->save();
                     }
                 }

            }

            
            
        return redirect()->route('my_properties_edit_photos',$propietie_id);
            
        }
     
    }




   

    public function pago($id) {
        $external_reference = UserPlansActivesModel::where('user_id',Auth::user()->id)->count();
        $external_reference = $external_reference.'-'.Auth::user()->id.'-'.$id;
        $external_reference = md5($external_reference);
           

        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and id = "'.$id.'"
   ');

        return view('frontend/publish.pago',compact('aPlans','external_reference'));
    }


    public function renovacion_pago(Request $request, $pay_id) {

        if($request['collection_status'] == 'approved'){
            $oRenovation = new RenovationsModel();
            $oRenovation->pay_id_mp =  $request['collection_id'];
            $oRenovation->expiration_at = date('Y-m-d', strtotime(now(). ' + 30 days'));
            $oRenovation->user_id = Auth::user()->id;
            $oRenovation->user_plan_id = $pay_id;
            $oRenovation->save();

            $oPlan = UserPlansActivesModel::where('id',$pay_id)->first();
            $oPlan->expiration_at = date('Y-m-d', strtotime(now(). ' + 30 days'));
            $oPlan->save();

            $aProperties = PropertiesModel::where('plan_id',$pay_id)->get();

            foreach($aProperties as $oProperty)
            {
                $oProperty->end_at = date('Y-m-d', strtotime(now(). ' + 30 days'));
            }
        }



        return redirect()->route('mis_propiedades.index');
    }

    public function setMainImage(Request $request ){
        $aReturn = array();
        $oImage = ImageModel::find($request['image_id']);
        $aImages = ImageModel::where('propietie_id','=',$oImage->propietie_id)
        ->get();

        foreach($aImages as $image)
        {
            if($image->id == $oImage->id)
            {
                $oImage->main_image = 1;
                $oImage->save();;
            }
            else{
                if($image->main_image == 1)
                {
                    $image->main_image = 0;
                    $image->save();
                }
            }
        }
        $aReturn['image_id'] = $request['image_id'];

        echo json_encode($aReturn);
    }


    

}
