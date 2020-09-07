<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\Properties_typeModel;
use App\Models\PlansModel;
use App\Models\ImageModel;
use App\Models\LocalitiesModel;
use App\Models\LuxuriesModel;
use App\Models\ServicesModel;
use App\Models\AmbientsModel;
use App\Models\GeneralCharacteristicsModel;
use App\Models\PropertiesLuxuriesModel;
use App\Models\PropertiesAmbientsModel;
use App\Models\PropertiesServicesModel;


class PublishController extends Controller {

    public function index() {

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
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

        $aCaracteristocasg = DB::select('SELECT *
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



        $aLocalities = LocalitiesModel::get();


        return view('frontend/publish/create.publish_dates',compact('aPropietie_type','aLocalities','aOperationType','aCurrencies','aPropieties_ambientes','aCaracteristocasg','aPropieties_services','aPropieties_luxuries'));
    }

    public function store_dates(Request $request){

         $user= Auth::user()->id;

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
            'antiquity' => 'required|numeric|max:6',
          
            
            
        );

        $this->validate($request, $aValidations);
         

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
        $operation_type_id = 1;
        $propietie_type_id = 1;
        $location_id = 2042010001;
        $direction ="Tandil 3239";

        if(!empty($request['expenses'])){
            $expensas =  $request['expenses'];
        }
        else{
            $expensas = 0;
        }
        
        
        $data = array('operation_type_id' => $operation_type_id,'propietie_type_id' => $propietie_type_id,'location_id' => $location_id,'user_id' => $user,'direction' => $direction,
        'name' => $name,'introduction' => $introduccion,'description' => $description,'currency_id' => $currency_id,'price' => $price,'expenses' => $expensas,'rooms' => $rooms,
        'bedrooms' => $bedrooms,'bathrooms' => $bathrooms,'years' => $years,'size' => $size);

        PropertiesModel::insert($data);
        
      
         $propietie_id = PropertiesModel::max('id');
         
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
                'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif,mp4'
            );               
        }
        else
        {
            $aValidations = array(
                'video' => 'required|max:10240|mimes:jpeg,png,jpg,gif,mp4'
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

            
            
        return redirect()->back()->with('propietie_id' , $propietie_id);
            
        }
     
    }


   

    public function deleteImage($id)
    {
        ImageModel::find($id)->delete();
        return redirect()->back();
    }






   

    public function pago($id) {

        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and id = "'.$id.'"
   ');

        return view('frontend/publish.pago',compact('aPlans'));
    }

    public function setMainImage(Request $request ){
        $aReturn = array();
        $oImage = ImageModel::find($request['image_id']);
        $aImages = ImageModel::where('product_id','=',$oImage->product_id)
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
