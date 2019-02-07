<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\CityRepositoryInterface;

class StateController extends Controller
{
    public function __construct(CountryRepositoryInterface $country)
    {
        $this->country = $country;
    }

    public function index()
    {
        $states = QueryBuilder::for(State::class)
            ->allowedFilters('name', 'country.name', 'country.id')
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
        $data = $request->all();
        $country = $this->country->getOrCreate($data, true);
        $data['country_id'] = $country->id;

        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'name_alternative' => ['string', 'max:255'],
            'country_id' => ['required', 'integer', 'max:255']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating state failed'
            ], 401);
        }

        //$state = State::create($data);
        //$state->save();

        $state = State::firstOrCreate(
            [
                'name'      => $data['name'],
                'country_id'   => $data['country_id']
            ],
            [
                'name_alternative' => (isset($data['name_alternative']) ? $data['name_alternative'] : '')
            ]
        );

        if ($state->wasRecentlyCreated === true) {
            $msg = 'State successfully created!';
        } else {
            $msg = 'State already existed.';
        }

        return StateResource::make($state)
            ->additional(['message' => $msg]);
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
