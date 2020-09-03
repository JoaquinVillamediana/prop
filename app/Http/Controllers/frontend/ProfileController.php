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

         $aPropieties=DB::select('SELECT * FROM propieties where deleted_at is null and id user_id = "'.$user_id.'"');

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
    public function edit(Request $request){
        $aValidations = array(
            
            'phone' => 'required|max:25',
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|max:60',
        );

        $this->validate($request, $aValidations);

       

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }

        $request['name'] = ucwords($request['name']);

        $oUser = Auth::user();

        
          
        $request['name'] = ucwords($request['name']);
        $request['last_name'] = ucwords($request['last_name']);
        $request['phone'] = ucwords($request['phone']);
        $oUser->name = $request['name'];
        $oUser->last_name = $request['last_name'];
       
        $oUser->phone = $request['phone'];
        $oUser->email = $request['email'];
        $oUser->save();
        return view('frontend/profile.index');
        // return redirect()->route('user.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

}
