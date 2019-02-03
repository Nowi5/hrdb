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

}
