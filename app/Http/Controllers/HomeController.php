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
use App\Models\ImageModel;
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


        $i = 1;
        $aLocalities = LocalitiesModel::get();
        $aProperties = PropertiesModel::select('properties.*','currency.symbol','images.image')
        ->leftjoin('currency','currency.id','=','properties.currency_id')
        // ->leftjoin('images','images.propietie_id','=','properties.id')
        // ->where('images.main_image','=','1')
        // ->where('images.deleted_at','=',NULL)
        ->leftjoin('images',function($leftjoin)use($i){
            $leftjoin->on('images.propietie_id','=','properties.id')
            ->where('images.main_image',1)
            ->where('images.deleted_at','=',NULL);
        })
        ->where('properties.priority','=','3')
        ->inRandomOrder()
        ->paginate(9);
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Properties_typeModel::where('properties_type.visible' ,'=', '1')
        ->get();
            
    

        return view('frontend/home.index',compact('aProperties','aOperationType','aPropietie_type','aLocalities'));
        
    }

   



}
