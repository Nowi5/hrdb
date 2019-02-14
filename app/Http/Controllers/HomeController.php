<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invite;
use Laravel\Passport\TokenRepository;
use Tracker;
use Carbon\Carbon;
use PragmaRX\Tracker\Support\Minutes;
use PragmaRX\Tracker\Vendor\Laravel\Support\Session;
use Bllim\Datatables\Facade\Datatables;
use PragmaRX\Tracker\Vendor\Laravel\Models\Log;
use DB;

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
    public function index(Request $request, Session $session)
    {
        // Define timerange e.g. yesterday
        /*$range = new Minutes();
        $range->setStart(Carbon::now()->subDays(2));
        $range->setEnd(Carbon::now()->subDays(1));
        */

        // Page Views in last 30 days
        $pageViews = Tracker::pageViews(60 * 24 * 30);
        $aPageViews = $pageViews->toArray();

        /*
        $username_column = Tracker::getConfig('authenticated_user_username_column');
        $query = Tracker::sessions($session->getMinutes(), false);
        $query->select([
            'id',
            'uuid',
            'user_id'
        ]);

        dd($query);

        $result = Datatables::of($query)
            ->edit_column('id', function ($row) use ($username_column) {
                $uri = route('tracker.stats.log', $row->uuid);
                return '<a href="'.$uri.'">'.$row->id.'</a>';
            })
            ->add_column('user', function ($row) use ($username_column) {
                return $row->user ? $row->user->$username_column : 'guest';
            })
            ->add_column('pageViews', function ($row) use ($username_column) {
                return $row->page_views;
            })
            ->make(true);

        dd($result);
        */

        /*
        $username_column = Tracker::getConfig('authenticated_user_username_column');
        $result = Datatables::of(Tracker::users($session->getMinutes(), false))
            ->edit_column('user_id', function ($row) use ($username_column) {
                return "{$row->user->$username_column}";
            })
            ->add_column('pageViews', function ($row) use ($username_column) {
                return $row->page_views;
            })
            ->make(true);
        dd($result);
        */

        $aNames = ['api.%'];
        //$minutes = 60 * 24 * 30;
        $range = new Minutes();
        $range->setStart(Carbon::now()->subDays(30));
        $range->setEnd(Carbon::now()); //->subDays(1)
        //$range = false;

        $result = Log::select(DB::raw('count(*) as views, tracker_routes.name'))
            ->join('tracker_route_paths', 'tracker_route_paths.id', '=', 'tracker_log.route_path_id')
            ->leftJoin(
                'tracker_route_path_parameters',
                'tracker_route_path_parameters.route_path_id',
                '=',
                'tracker_route_paths.id'
            )
            ->join('tracker_routes', 'tracker_routes.id', '=', 'tracker_route_paths.route_id')
            //->whereIn('tracker_routes.name', $aNames)
            ->where(function ($query) use($aNames) {
                for ($i = 0; $i < count($aNames); $i++){
                    $query->orwhere('tracker_routes.name', 'like', $aNames[$i]);
                }
            })
            ->groupBy('tracker_routes.name')
            ->orderBy('views');
        if ($range) {
            $result->period($range, 'tracker_log');
        }

        $aPageViewsByRoute = $result->get()->toArray();
        //--------------------- end statistics

        $invite = Invite::firstOrCreate(
            ['user_id' => auth()->id()]
        );

        $oauthtoken = $this->forUser($request);

        $oauthtokenExists = (sizeof($oauthtoken) > 0);

        return view('home', [
            'inviteToken'       => $invite->token,
            'oAuthTokenExists'  => $oauthtokenExists,
            'aPageViews'        => $aPageViews,
            'aPageViewsByRoute' => $aPageViewsByRoute
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
