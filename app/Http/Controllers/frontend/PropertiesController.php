<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; 

use Auth;
use Hash;

class PropertiesController extends Controller {

    public function index() {

        
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
