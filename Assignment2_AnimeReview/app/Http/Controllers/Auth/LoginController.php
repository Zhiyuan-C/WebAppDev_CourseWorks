<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
    || Override default showLoginForm from Illuminate\Foundation\Auth\AuthenticatesUsers
    || Pass the previous page's url to the view for future redirect if previous page is not login page
    **/
    public function showLoginForm()
    {
        $url = url()->previous() != url('login') ? url()->previous() : null;
        $previous = old('previous', $url);
        return view('auth.login')->with('previous', $previous);
    }
    
    /**
    || Override default authenticated from Illuminate\Foundation\Auth\AuthenticatesUsers
    || To redirect user to previous page after they succussfully log in if previous page is not login page
    **/
    protected function authenticated($request,$user)
    {
        if(Auth::user()){
            $this->redirectTo = $request->previous ? $request->previous : $this->redirectTo; 
        }
    }

}
