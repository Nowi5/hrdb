<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact.index');
    }

    public function create()
    {
        return view('contact.index');
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
            'email' => ['required', 'string', 'email', 'max:255']
        ];

        return Validator::make($data, $validation_array);
    }

    public function store(Request $request)
    {
        $this->validator($request->all());

        Mail::to(config('mail.addresses.support'))->send(new ContactEmail($request->all()));

        return redirect()->back()->withSuccess('Request send');

    }
}
