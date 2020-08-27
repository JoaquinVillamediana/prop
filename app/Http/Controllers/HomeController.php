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
        $aPropieties = PropietiesModel::get();
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
        $aPropietie_type = Propietie_typeModel::where('propietie_type.visible' ,'=', '1')
        ->get();
            
        return view('frontend/home.index',compact('aPropieties','aOperationType','aPropietie_type','aLocalities'));
        
    }

    public function propietie($id)
    {

        $aProp=DB::select('SELECT p.*,(u.name) user_name,(u.id) user_id
        FROM propieties p
        LEFT JOIN users u ON p.user_id = u.id
        where p.deleted_at is null
        and p.visible = 1
        and p.id = "'.$id.'"
        GROUP BY p.id;
   ');
        return view('frontend/propietie.index',compact('aProp'));
        
    }
}
