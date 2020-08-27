<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProfileController extends Controller {

    public function index() {

        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
        return view('frontend/profile.index');
    }

    public function user_perfil_publicaciones($user_id) {
        
      
        $aUser = DB::select('SELECT u.*,COUNT(p.id) AS countprop
        FROM users u
        LEFT JOIN propieties p
        ON p.user_id = u.id
        where u.deleted_at is null
        and p.deleted_at is null
        and u.id = "'.$user_id.'"
        GROUP BY u.id
         ');

         $aPropieties=DB::select('SELECT * FROM propieties where deleted_at is null');

         return view('frontend/profile_userx.index',compact('aUser','aPropieties'));
    }

    public function personal() {
        return view('frontend/publish.personal');
    }
    public function profesional() {
        return view('frontend/publish.profesional');
    }

    public function create() {
        return view('admin/user.create');
    }

}
