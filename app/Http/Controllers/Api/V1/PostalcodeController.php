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

    public function store(Request $request)
    {
        $postalcode = Postalcode::create($request->all());
        return response()->json($postalcode, 201);
    }

    public function update(Request $request, Postalcode $postalcode)    
    {
        $postalcode->update($request->all());
        return response()->json($postalcode, 200);
    }

    // There should be no need to update or delete postalcodes, instead create new
    /*
    public function delete(Postalcode $postalcode)    
    {
        $postalcode->delete();
        return response()->json(null, 204);
    }
    */

}
