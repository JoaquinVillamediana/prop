<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB; 

use Auth;
use Hash;

class PropietiesController extends Controller {

    public function index() {

        // $aUsers = User::get();
        
        $user=Auth::user()->id;


        $aPropieties = PropietiesModel::select('propieties.*','currency.symbol')
        ->leftjoin('currency','propieties.currency_id','currency.id')
        ->where('propieties.visible','=','1')
        ->where('propieties.user_id',$user)
        ->whereNull('currency.deleted_at')
        ->get();

        $totalViews = 0;

        foreach($aPropieties as $Property)
        {
            $totalViews += views($Property)->count();
        }

        // $aPropieties=DB::select('SELECT propieties.* , currency.symbol as symbol
        // FROM propieties
        // LEFT JOIN currency ON currency.id = propieties.currency_id
        // where propieties.deleted_at is null
        // and propieties.visible = 1
        // and currency.deleted_at is null
        // and propieties.user_id = "'.$user.'"
        // ');

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
        
   return view('frontend/propieties.index',compact('aPropieties','aDatos','aDatosProp','totalViews'));
        // return view('frontend/propieties.index');
    }

  

}
