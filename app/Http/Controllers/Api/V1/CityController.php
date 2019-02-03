<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\CityCollection;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{

    public function index()
    {
        $cities = QueryBuilder::for(City::class)
            ->allowedFilters('name')
            ->paginate();

        return CityResource::collection($cities);
    }

    public function show(City $city)
    {
        CityResource::withoutWrapping();
        return new CityResource($city);
    }

}
