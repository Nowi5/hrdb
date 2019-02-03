<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\StreetCollection;
use App\Http\Resources\StreetResource;
use App\Models\Street;

class StreetController extends Controller
{

    public function index()
    {
        $streets = QueryBuilder::for(Street::class)
            ->allowedFilters('name')
            ->paginate();

        return StreetResource::collection($streets);
    }

    public function show(Street $street)
    {
        StreetResource::withoutWrapping();
        return new StreetResource($street);
    }

    public function store(Request $request)
    {
        //@todo: check for city id or city name

        //@todo: check if combination of streetname and city existis, if yes just update
        $street = Street::create($request->all());
        return response()->json($street, 201);
    }


    public function update(Request $request, Street $street)    
    {
        $street->update($request->all());
        return response()->json($street, 200);
    }

    // There should be no need to delete streets, instead create new
    /*
    public function delete(Street $street)
    {
        $street->delete();
        return response()->json(null, 204);
    }
    */
}
