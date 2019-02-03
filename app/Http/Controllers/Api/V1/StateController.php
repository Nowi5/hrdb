<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;
use App\Models\State;

class StateController extends Controller
{

    public function index()
    {
        $states = QueryBuilder::for(State::class)
            ->allowedFilters('name')
            ->paginate();

        return StateResource::collection($states);
    }

    public function show(State $State)
    {
        StateResource::withoutWrapping();
        return new StateResource($State);
    }

    public function store(Request $request)
    {
        $state = State::create($request->all());
        return response()->json($state, 201);
    }


    public function update(Request $request, State $state)    
    {
        $state->update($request->all());
        return response()->json($state, 200);
    }

    // There should be no need to delete states, instead create new
    /*
    public function delete(State $state)    
    {
        $state->delete();
        return response()->json(null, 204);
    }
    */

}
