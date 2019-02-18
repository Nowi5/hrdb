<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index()
    {
        return response()->json(
            [   'links' =>
                [

                    'cities' => route('api.cities.index'),
                    'countries' => route('api.countries.index'),
                    'languages' => route('api.languages.index'),
                    'jobpostings' => route('api.jobpostings.index'),
                   // 'postalcodes' => route('api.postalcodes.index'),
                    'skills' => route('api.skills.index'),
                    'states' => route('api.states.index'),
                    'user'  => route('api.user'),
                    'users' => route('api.users.index'),

                ]
            ]
        );
    }

}
