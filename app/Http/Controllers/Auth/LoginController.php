<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Controllers\Auth\Request;

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
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin( \Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    protected function sendLoginResponse(\Illuminate\Http\Request $request)
    {

        $request->session()->regenerate();
        $this->clearLoginAttempts($request);

        if ($request->expectsJson() || $request->is('api/*')) {
            $response['message'] = 'Login successful';
            $response['location'] = redirect()->intended($this->redirectPath())->getTargetUrl();
            return response()->json($response, 200);
        }

        return $this->authenticated($request, $this->guard()->user())?: redirect()->intended($this->redirectPath());
    }
}
