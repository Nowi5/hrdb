<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\postalcodeCollection;
use App\Http\Resources\postalcodeResource;
use App\Models\Postalcode;

class PostalcodeController extends Controller
{

    public function index()
    {
        $postalcodes = QueryBuilder::for(postalcode::class)
            ->allowedFilters('name')
            ->paginate();

        return postalcodeResource::collection($postalcodes);
    }

    public function show(postalcode $postalcode)
    {
        postalcodeResource::withoutWrapping();
        return new postalcodeResource($postalcode);
    }

}
