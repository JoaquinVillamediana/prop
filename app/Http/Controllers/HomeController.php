<?php

namespace App\Http\Controllers;

use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aPropieties = DB::select('SELECT * FROM propieties');
        
        $aOperationType = Operation_typeModel::where('operation_type.visible' ,'=', '1')
        ->get();
            
            
        return view('frontend/home.index',compact('aPropieties','aOperationType'));
        
    }

    public function propietie()
    {
        return view('frontend/propietie.index');
        
    }
}
