<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RuserController extends Controller {

    public function index() {

     
        return view('frontend/register.index');
    }

    public function store(Request $request) {

        $aValidations = array(
          
            'phone' => 'required|max:25',
           
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|max:32',
        );

        

        $this->validate($request, $aValidations);

        $userEmail = User::where('email', $request['email'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }   

        $request['password'] = bcrypt($request['password']);
        $request['name'] = ucwords($request['name']);
        $request['phone'] = ucwords($request['phone']);
        $request['last_name'] = ucwords($request['last_name']);
        $request['type'] = ucwords($request['type']);

        User::create($request->all());

        return redirect()->route('home')->with('success', 'Registro actualizado satisfactoriamente');
    }


    public function store_publish(Request $request) {

        $aValidations = array(
          
            'phone' => 'required|max:25',
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|max:32',
        );

        

        $this->validate($request, $aValidations);

        $userEmail = User::where('email', $request['email'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }   

        $request['password'] = bcrypt($request['password']);
        $request['name'] = ucwords($request['name']);
        $request['phone'] = ucwords($request['phone']);
        $request['last_name'] = ucwords($request['last_name']);
        $request['type'] = ucwords($request['type']);
        $request['dni'] = ucwords($request['name']);
        $request['cuit'] = ucwords($request['cuit']);

        User::create($request->all());

        return redirect()->route('home')->with('success', 'Registro actualizado satisfactoriamente');
    }


}
