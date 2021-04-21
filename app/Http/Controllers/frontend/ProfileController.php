<?php


namespace App\Http\Controllers\frontend;
use App\Models\PropertiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\UsersProfileModel ;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Support\MessageBag;


use Schema;
use Hash;


class ProfileController extends Controller {

    public function index() {
    

        
        $aUsers = User::where('id',Auth::user()->id)->first();
        $user = Auth::user()->id;
      
        $aUsers= DB::select('SELECT u.*,up.*,usm.*
        FROM users u
        LEFT JOIN users_profile up ON(u.id = up.user_id)
        LEFT JOIN user_social_medias usm ON(u.id = usm.user_id)
        where u.deleted_at is null
        and u.id = "'.$user.'"
        ');

        $oUsersProfile = UsersProfileModel::where('user_id',$user)->first();

    // $completed = $columns - $this->getNullValues($oUsersProfile);
        // $percent = intval(($completed * 100) /6) ;
   
        // return view('frontend/profile.index',compact('aUsers','percent'));
        //  return view('frontend/login.index',compact('aCategories','aSubCategories'));
         return view('frontend/profile.index',compact('aUsers'));
    }

    public function user_perfil_publicaciones($user_id) {
        
        $aProperties = PropertiesModel::select('properties.*','currency.symbol','images.image')
        ->leftjoin('currency','currency.id','=','properties.currency_id')
        ->leftjoin('images','images.propietie_id','=','properties.id')
        ->where('images.main_image','=','1')
        ->where('images.deleted_at','=',NULL)
        ->where('properties.user_id','=',$user_id)
        ->paginate(9);
        

        $aUser = DB::select('SELECT u.*,up.profile_image as profile_image 
        FROM users u
    
        LEFT JOIN users_profile up
        ON (u.id = up.user_id )
        LEFT JOIN user_social_medias usm
        ON (u.id = usm.user_id )
        where u.deleted_at is null
      
        and u.id = "'.$user_id.'"
         ORDER BY 
         u.id DESC 
         ');

      
        // $aUser= User::select('users.*','properties.id' ,'users_profile.profile_image as profile_image ')
        // ->leftjoin('users_profile','users.id','users_profile.user_id')
        // ->leftjoin('user_social_medias','users.id','user_social_medias.user_id')
        // ->leftjoin('properties','users.id','properties.user_id')
        // ->where('users.deleted_at','=',NULL)
        // ->where('properties.deleted_at','=',NULL)
        // ->where('users.id','=','"'.$user_id.'"')
        // ->first();


         return view('frontend/profile.random_user',compact('aUser','aProperties'));
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

    

        

    public function edit_profile_photo(Request $request){
 

        
            $aValidations = array(
                'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif,mp4'
            );               
        
        

        

        $this->validate($request , $aValidations);

        
            $image = $request['image'];   
                      
           
            
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            

            $destinationPath = 'images/profile_pictures_users';
            $image->move($destinationPath, $storeImageName);

            
            
            $user = Auth::user()->id;
            $xd = UsersProfileModel::where('user_id','=',$user)->first();

            $xd->profile_image = $storeImageName;
            $xd->save();
           
           

           
                    

            return redirect()->back();

    }
    

}
