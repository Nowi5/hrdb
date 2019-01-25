<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invite = Invite::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        return view('home', ['inviteToken' => $invite->token]);
    }
}
