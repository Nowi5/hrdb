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

    public function store(Request $request)
    {
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }


    public function update(Request $request, Country $country)    
    {
        $country->update($request->all());
        return response()->json($country, 200);
    }

    // There should be no need to update or delete countries, instead create new
    /*
    public function delete(Country $country)    
    {
        $country->delete();
        return response()->json(null, 204);
    }
    */

}
