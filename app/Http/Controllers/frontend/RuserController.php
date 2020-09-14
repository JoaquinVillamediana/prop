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
            'user-type' => 'required|numeric',
            'phone' => 'max:25',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|max:32',
            'password_confirm' => 'required|min:8|max:32',
        );
        if(!empty($request['user-type']))
        {
            if($request['user-type'] == 1)
            {
                $aValidations['name'] = 'required|max:60';
                $aValidations['last_name'] = 'required|max:60';
            }
            if($request['user-type'] == 2)
            {
                $aValidations['publish_type'] = 'required|numeric';
                if(!empty($request['publish_type']))
                {
                    if($request['publish_type'] == 1)
                    {
                        $aValidations['company_name'] = 'required|max:60';
                        $aValidations['cuit'] = 'required|max:60';
                        $aValidations['social_reason'] = 'required|max:60';
                    }
                    
                    if($request['publish_type'] == 2)
                    {
                        $aValidations['name'] = 'required|max:60';
                        $aValidations['last_name'] = 'required|max:60';
                        $aValidations['dni'] = 'required|max:60';
                    }
                }
            }
        }

        $this->validate($request, $aValidations);



        $userEmail = User::where('email', $request['email'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }   

        if ($request['password_confirm'] != $request['password']) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'passwords_not_equal' => ['PASSWORDS NOT EQUAL']
            ]);

            throw $error;
        }   

        if(($request['user-type'] < 1 || $request['user-type'] > 2) || ($request['publish_type'] < 1 || $request['publish_type'] > 2) )
        {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'wrong_request' => ['WRONG REQUEST']
        ]);

        throw $error;
        }




        $request['password'] = bcrypt($request['password']);

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
