<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Invite;

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

    use RegistersUsers;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validation_array = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
        ];

        if(env('INVITE_ONLY', 'false')) {
            $validation_array['invite_token'] = ['required', 'string', 'min:6', 'max:255'];
        }

        return Validator::make($data, $validation_array);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(env('INVITE_ONLY')) {
            $invite = Invite::where('token', $data['invite_token'])->first();
            if($invite){
                $invite_id = $invite->id;
            }
            else{
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'invite_token' => trans('messages.invalid_invite_token')
                ]);
                throw $error;
            }
        }
        else{
            $invite_id = null;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'invite_id' => $invite_id,
            'password' => Hash::make($data['password']),
        ]);
    }
}
