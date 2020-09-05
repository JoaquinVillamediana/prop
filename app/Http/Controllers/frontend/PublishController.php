<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\PlansModel;
use App\Models\LocalitiesModel;
use App\Models\ImageModel;
use App\Models\AmbientesModel;
use App\Models\CargenModel;
use App\Models\ServiciosModel;


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
        // return view('frontend/publish.personal');
    }
    public function profesional() {

        
        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and user_type = 3
   ');

return view('frontend/publish.profesional',compact('aPlans'));

        // return view('frontend/publish.profesional');
    }

    // publicar
    public function publish_login1() {

        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();

        $aCurrencies = DB::select('SELECT *
         FROM currency
         where deleted_at is null
        ');

        $aPropieties_ambientes = DB::select('SELECT *
        FROM ambientes
        where deleted_at is null
        ');

        $aCaracteristocasg = DB::select('SELECT *
        FROM caracteristicas_generales
        where deleted_at is null
        ');

        $aPropieties_services = DB::select('SELECT *
        FROM services
        where deleted_at is null
        ');

        $aPropieties_luxuries = DB::select('SELECT *
        FROM comodidades
        where deleted_at is null
        ');



        $aLocalities = LocalitiesModel::get();


        return view('frontend/publish/personal.publish1',compact('aPropietie_type','aLocalities','aOperationType','aCurrencies','aPropieties_ambientes','aCaracteristocasg','aPropieties_services','aPropieties_luxuries'));
    }

    public function store1(Request $request){

         $user= Auth::user()->id;

        $aValidations = array(
            
           
            'direction' => 'required|max:200',
          
            
            
        );

        $this->validate($request, $aValidations);
         
        $direction =  $request['direction'];
        $operation_type_id =  $request['operation'];
        $propietie_type_id =  $request['building'];
        // $location_id =  $request['locality'];
        $location_id = '66140050000';
        $name =  $request['titulo'];
        $introduccion =  $request['introduccion'];
        $descripcion =  $request['descripcion'];
        $currency_id =  $request['currency_id'];
        $price =  $request['price'];

        if(!empty($request['expensas'])){
            $expensas =  $request['expensas'];
        }else{
            $expensas = 0;
        }
        
        $rooms =  $request['rooms'];
        $bedrooms =  $request['bedrooms'];
        $bathroooms =  $request['bathroooms'];
        $garages =  $request['garages'];
        $toilettes =  $request['toilettes'];
        $years =  $request['years'];
        $size =  $request['size'];

        $data=array('operation_type_id' => $operation_type_id,'propietie_type_id' => $propietie_type_id,'location_id' => $location_id,'user_id' => $user,'direction' => $direction,
        'name' => $name,'introduccion' => $introduccion,'description' => $descripcion,'currency_id' => $currency_id,'price' => $price,'expensas' => $expensas,'rooms' => $rooms,
        'bedrooms' => $bedrooms,'bathrooms' => $bathroooms,'garages' => $garages,'toilettes' => $toilettes,'years' => $years,'size' => $size);
        PropietiesModel::insert($data);
        
        //  $propietie_id = DB::select('SELECT max(id) from propieties where user_id =  "'.$user.'"');
         $propietie_id = PropietiesModel::max('id');
         
         return redirect()->route('publish_personal_free2', $propietie_id);
        // return view('frontend/publish.pago');

    }

         public function publish_login2($propietie_id) {

        $aImages = ImageModel::select('images.*','propieties.name as propietie_name')
        ->leftjoin('propieties','propieties.id','=','images.propietie_id')
        ->where('propietie_id','=',$propietie_id)
        ->get();

         $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
         ->get();
         $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
         ->get();

         $aCurrency = DB::select('SELECT *
         FROM currency
         where deleted_at is null
        ');

        $aAmbientes = DB::select('SELECT *
        FROM ambientes
        where deleted_at is null
        ');

        $aCaracteristocasg = DB::select('SELECT *
        FROM caracteristicas_generales
        where deleted_at is null
        ');

        $aServicios = DB::select('SELECT *
        FROM services
        where deleted_at is null
        ');

        $aComodidades = DB::select('SELECT *
        FROM comodidades
        where deleted_at is null
        ');


         return view('frontend/publish/personal.publish2',compact('aPropietie_type','aComodidades','aServicios','aCaracteristocasg','aAmbientes','aCurrency'))->with('propietie_id',$propietie_id);
     }

    public function store2(Request $request)
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


   








   

    public function pago($id) {

        $aPlans=DB::select('SELECT *
        FROM publish_plans
        where deleted_at is null
        and visible = 1
        and id = "'.$id.'"
   ');

        return view('frontend/publish.pago',compact('aPlans'));
    }

    

}
