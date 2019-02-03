<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\LocationCollection;
use App\Http\Resources\LocationResource;
use App\Models\Location;

class LocationController extends Controller
{

    public function index()
    {
        $locations = QueryBuilder::for(Location::class)
            ->allowedFilters('name')
            ->paginate();

        return LocationResource::collection($locations);
    }

    public function show(Location $location)
    {
        LocationResource::withoutWrapping();
        return new LocationResource($location);
    }

}
