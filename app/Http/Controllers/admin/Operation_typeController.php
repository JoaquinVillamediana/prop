<?php

namespace App\Http\Controllers\admin;
use App\Models\PropietiesModel;
use App\Models\Operation_typeModel;
use App\Models\Propietie_typeModel;
use App\Models\LocalitiesModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class Operation_typeController extends Controller {

    public function index() {

        //  $aProp = PropietiesModel::get();
        
        $aOperation_type = Operation_typeModel::get();
        return view('admin/operation_type.index',compact('aOperation_type'));
    }

    public function create() {
        return view('admin/operation_type.create');
    }

    public function store(Request $request) {

        $aValidations = array(
            
            'name' => 'required|max:60',
            
        );

        

        $this->validate($request, $aValidations);

        $userEmail = Operation_typeModel::where('name', $request['name'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }   

                $request['name'] = ucwords($request['name']);
        

                Operation_typeModel::create($request->all());

        return redirect()->route('operation_type')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $oUser = User::find($id);
        return view('admin/user.edit', compact('oUser'));
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            'type' => 'required',
            'phone' => 'required|max:25',
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|max:60',
        );

        $this->validate($request, $aValidations);

        $userEmail = User::where('email', $request['email'])->where('id', '!=', $id)->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }

        $request['name'] = ucwords($request['name']);

        $oUser = User::find($id);

        if (!empty($request['password'])) {

            $this->validate(
                    $request, [
                        'password' => 'required|min:8|max:32'
                    ]
            );

            $request['password'] = bcrypt($request['password']);
        } else {
            $request['password'] = $oUser->password;
        }
          
        $request['password'] = bcrypt($request['password']);
        $request['name'] = ucwords($request['name']);
        $request['last_name'] = ucwords($request['last_name']);
        $request['phone'] = ucwords($request['phone']);
        $oUser->name = $request['name'];
        $oUser->last_name = $request['last_name'];
        $oUser->password = $request['password'];
        $oUser->phone = $request['phone'];
        $oUser->email = $request['email'];
        $oUser->save();

        return redirect()->route('user.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function destroy($id) {

        User::find($id)->delete();

        return redirect()->route('user.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function propieties_type()
    {
        $aPropietie_type = Propietie_typeModel::get();
        return view('admin/propieties.propieties_type',compact('aPropietie_type'));
    }

    public function operation_type()
    {
        $aOperation_type = Operation_typeModel::get();
        return view('admin/propieties.operation_type',compact('aOperation_type'));
    }

}
