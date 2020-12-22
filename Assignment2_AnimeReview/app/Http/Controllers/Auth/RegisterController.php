<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers {
        showRegistrationForm as show; // call later in showRegistrationForm() to override
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
    || Override defaut showRegistrationForm() under Illuminate\Foundation\Auth\RegistersUsers
    ||          pass the input_fields varibles for display in view with loop
    || @return view('auth.register')
    **/
    public function showRegistrationForm(){
        $input_fields = ['email', 'password', 'password_confirmation', 'nick_name', 'date', 'type_id'];
        return $this->show()->with('input_fields', $input_fields);
    } 
    
    /**
    || Get a validator for an incoming registration request.
    ||
    || @param  array  $data
    || @return \Illuminate\Contracts\Validation\Validator
    **/
    protected function validator(array $data)
    {
        // validate input field
        $rules = [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'nick_name' => 'required|string|max:255',
            'date' => 'required|date',
            'type_id' => [ 'nullable', Rule::in(['mkey!@123']), ],
        ];
        // customise error message when type_id is not valid.
        $messages = [
            'type_id.in' => "Invalid registration code, please check with admin"
        ];
        return Validator::make($data, $rules, $messages);
    }

    /**
    || Create a new user instance after a valid registration.
    ||
    || @param  array  $data
    || @return \App\User
    **/
    protected function create(array $data)
    {
        // if regist key is not provided, then default regular user
        if(is_null($data['type_id'])){
            $data['type_id'] = 1;
        }
        // if provided, then is moderator user
        else{
            $data['type_id'] = 2;
        }
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'nick_name' => $data['nick_name'],
            'dob' => $data['date'],
            'type_id' => $data['type_id'],
        ]);
    }
}
