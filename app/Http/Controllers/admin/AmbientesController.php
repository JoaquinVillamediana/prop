<?php

namespace App\Http\Controllers\admin;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\LocalitiesModel;
use App\Models\PlansModel;
use App\Models\AmbientesModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AmbientesController extends Controller {

    public function index() {

        //  $aProp = PropietiesModel::get();
        
         $aAmbientes = AmbientesModel::get();

         return view('admin/ambientes.index',compact('aAmbientes'));
    }

    public function create() {
        return view('admin/ambientes.create');
    }

    public function store(Request $request) {

        $aValidations = array(
            
            'name' => 'required|max:60',
            
        );

        

        $request['name'] = ucwords($request['name']);
       
        AmbientesModel::create($request->all());

        return redirect()->route('ambientes.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $oAmbientes = AmbientesModel::find($id);
        return view('admin/ambientes.edit', compact('oAmbientes'));
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            
            'name' => 'required|max:60',
            
        );

        $this->validate($request, $aValidations);

       

        $request['name'] = ucwords($request['name']);

        $oUser = AmbientesModel::find($id);

          
        $request['name'] = ucwords($request['name']);
     
        $oUser->name = $request['name'];
     
        $oUser->save();

        return redirect()->route('user.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function destroy($id) {

        User::find($id)->delete();

        return redirect()->route('user.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

}
