<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LawyersTypeModel;
use App\Models\ProvincesModel;

use App\Models\PropertiesModel;

use App\Models\User;
use App\Models\Technical_SupportModel;
use App\Models\UsersProfileModel;

use App\Models\UserSocialMediasModel;
use DB;
use Auth;


class ConfigurationController extends Controller
{
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $oUsersProfile = UsersProfileModel::where('user_id',Auth::user()->id)->first();
        $oUserSocialMedia = UserSocialMediasModel::where('user_id',Auth::user()->id)->first();
        // $Empty = "Vacio";
         $aPublications = PropertiesModel::where('user_id',Auth::user()->id)->get();
        $aSupportinfo = Technical_SupportModel::where('user_id',Auth::user()->id)->get();

        
 
        return view('frontend/configuration.index',compact('oUsersProfile','oUserSocialMedia','aSupportinfo','aPublications'));
    }
    public function profile_edit(Request $request){
        $oUserSocialMedia = UserSocialMediasModel::where('user_id',Auth::user()->id)->first();
        $user_id=Auth::user()->id;
        if(!empty($oUserSocialMedia)){
        if(!empty($request['facebook'])){
            $oUserSocialMedia->facebook = $request['facebook'];

        }
        if(!empty($request['instagram'])){
            $oUserSocialMedia->instagram = $request['instagram'];

        }
        if(!empty($request['twitter'])){
            $oUserSocialMedia->twitter = $request['twitter'];

        }
       if(!empty($request['linkedin'])){
        $oUserSocialMedia->linkedin = $request['linkedin'];

       }
       if(!empty($request['website'])){
        $oUserSocialMedia->website = $request['website'];

       }
        $oUserSocialMedia->save();
    }
    else{

        if(!empty($request['facebook'])){
            $facebook = $request['facebook'];

        }
        else{
            $facebook=NULL;
        }
        if(!empty($request['instagram'])){
            $instagram = $request['instagram'];

        }
        else{
            $instagram=NULL;
        }
        if(!empty($request['twitter'])){
            $twitter = $request['twitter'];

        }
        else{
            $twitter=NULL;
        }
       if(!empty($request['linkedin'])){
        $linkedin = $request['linkedin'];

       }
       else{
           $linkedin=NULL;
        }
       if(!empty($request['website'])){
        $website = $request['website'];
       }
       else{
           $website=NULL;
        }
         $data = array('user_id' => $user_id,'facebook' => $facebook,'website' => $website,'linkedin' => $linkedin,'twitter' => $twitter,'instagram' => $instagram);
 
         UserSocialMediasModel::insert($data);
    }
        return redirect()->route('configuration.index');

    }
    public function edit_socialmedia(Request $request){
        $oUserSocialMedia = UserSocialMediasModel::where('user_id',Auth::user()->id)->first();


        if(!empty($request['facebook'])){
            $oUserSocialMedia->facebook = $request['facebook'];

        }
        if(!empty($request['instagram'])){
            $oUserSocialMedia->instagram = $request['instagram'];

        }
        if(!empty($request['twitter'])){
            $oUserSocialMedia->twitter = $request['twitter'];

        }
       if(!empty($request['linkedin'])){
        $oUserSocialMedia->linkedin = $request['linkedin'];

       }
       if(!empty($request['website'])){
        $oUserSocialMedia->website = $request['website'];

       }
        $oUserSocialMedia->save();
        return redirect()->route('configuration.index');

    }
    public function setProductVisible(Request $request){
        $aReturn = array();
        $oProduct = PropertiesModel::find($request['productId']);

        if (empty($oProduct->visible)) {
            $oProduct->visible = 1;
            $oProduct->visible_at = date('Y-m-d H:i:s');
        } else {
            $oProduct->visible = 0;
        }

        $oProduct->save();

        $aReturn['productId'] = $request['productId'];
        $aReturn['visible'] = $oProduct->visible;

        echo json_encode($aReturn);
    }
    public function destroy($id) {

        PropertiesModel::find($id)->delete();

        return redirect()->route('configuration.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function destroy_user($id) {

        User::find($id)->delete();

        return redirect()->route('home')->with('success', 'Registro eliminado satisfactoriamente');
    }
     public function technical_support(Request $request){
        $user = Auth::user()->id;
    
        $data=array('user_id' => $user,'title' => $request['title'],'text' => $request['text']);
        Technical_SupportModel::insert($data);
        return redirect()->route('configuration')->with('success', 'Registro eliminado satisfactoriamente');

     }
}
