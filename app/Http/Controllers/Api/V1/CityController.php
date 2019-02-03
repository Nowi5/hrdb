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

    public function store(Request $request)
    {
        $city = City::create($request->all());
        return response()->json($city, 201);
    }


    public function update(Request $request, City $city)
    {
        $city->update($request->all());
        return response()->json($city, 200);
    }

    // There should be no need to delete cities, instead create new
    /*
    public function delete(City $city)    
    {
        $city->delete();
        return response()->json(null, 204);
    }
    */
}
