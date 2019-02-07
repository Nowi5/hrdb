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
                    'user'  => route('api.user'),
                    'users' => route('api.users.index'),
                    'cities' => route('api.cities.index'),
                    'postalcodes' => route('api.postalcodes.index'),
                    'states' => route('api.states.index'),
                    'countries' => route('api.countries.index'),
                    'languages' => route('api.languages.index'),
                ]
            ]
        );
    }

}
