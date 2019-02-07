<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\LocationCollection;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{

    public function index()
    {
        $locations = QueryBuilder::for(Location::class)
            ->allowedFilters(
                'line1', 'line2', 'line3', 'number',
                'street_id', 'street.id', 'street.name',
                'city_id', 'city.id', 'city.name')
            ->allowedIncludes('city', 'state')
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
        $city = $this->city->getOrCreate($data, true);
        $data['city_id'] = $city->id;

        $location = Location::create($request->all());
        return response()->json($location, 201);
    }



    protected function getStreet($data){
        if(isset($data['street_id'])){
            return Street::where('id', $data['street_id'])->first();
        }
        if(isset($data['street']['id'])){
            return Street::where('id', $data['street']['id'])->first();
        }

        //@todo: How to handle where city name is not unique?
        if(isset($data['street']['name'])){
            return Street::where(
                'name', $data['street']['name'],
                'city_id', $data['city']['id']
            )->first();
        }

        return null;
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
