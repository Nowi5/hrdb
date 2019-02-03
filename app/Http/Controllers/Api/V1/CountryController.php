<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
use App\Models\Country;

class CountryController extends Controller
{

    public function index()
    {
        $countries = QueryBuilder::for(Country::class)
            ->allowedFilters('name')
            ->paginate();

        return CountryResource::collection($countries);
    }

    public function show(Country $Country)
    {
        CountryResource::withoutWrapping();
        return new CountryResource($Country);
    }

}
