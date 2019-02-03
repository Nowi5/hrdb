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

    public function store(Request $request)
    {
        $location = Location::create($request->all());
        return response()->json($location, 201);
    }

    // There should be no need to update or delete locations, instead create new
    /*
    public function update(Request $request, Location $location)    
    {
        $location->update($request->all());
        return response()->json($location, 200);
    }

    public function delete(Location $location)    
    {
        $location->delete();
        return response()->json(null, 204);
    }
    */

}
