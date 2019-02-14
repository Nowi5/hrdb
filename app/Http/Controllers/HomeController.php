<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use Laravel\Passport\TokenRepository;

class HomeController extends Controller
{

    protected $tokenRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $invite = Invite::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        $oauthtoken = $this->forUser($request);

        $oauthtokenExists = (sizeof($oauthtoken) > 0);

        return view('home', [
            'inviteToken'       => $invite->token,
            'oAuthTokenExists'  => $oauthtokenExists
        ]);
    }

    /**
     * Get all of the personal access tokens for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function forUser(Request $request)
    {
        $tokens = $this->tokenRepository->forUser($request->user()->getKey());
        return $tokens->load('client')->filter(function ($token) {
            return $token->client->personal_access_client && ! $token->revoked;
        })->values();
    }
}
