<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\CityCollection;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\CountryRepositoryInterface;
use App\Repositories\StateRepositoryInterface;

class CityController extends Controller
{
    public function __construct(StateRepositoryInterface $state, CountryRepositoryInterface $country)
    {
        $this->state = $state;
        $this->country = $country;
    }

    public function index()
    {
        $cities = QueryBuilder::for(City::class)
            ->allowedFilters('name', 'country.name', 'country.id', 'iso2', 'name_long', 'name_lcoal', 'name_english')
            ->allowedIncludes('state', 'country')
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
        $data = $request->all();
        $state = $this->state->getOrCreate($data, true);
        $data['state_id'] = $state->id;

        $country = $this->country->getOrCreate($data, true);
        $data['country_id'] = $country->id;

        $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'name_alternative' => ['string', 'max:255'],
            'name_english' => ['string', 'max:255'],
            'state_id'   => ['required', 'integer'],
            'country_id'   => ['required', 'integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating City failed'
            ], 401);
        }

        $city = City::firstOrCreate(
            [
                'name'          => $data['name'],
                'country_id'    => $data['country_id'],
                'state_id'      => $data['state_id'],
                'postalcode'    => $data['postalcode'],
            ],
            [
                'name_alternative' => (isset($data['name_alternative']) ? $data['name_alternative'] : ''),
                'name_englisch' => (isset($data['name_englisch']) ? $data['name_englisch'] : '')
            ]
        );

        if ($city->wasRecentlyCreated === true) {
            $msg = 'City successfully created!';
        } else {
            $msg = 'City already existed';
        }

        return CityResource::make($city)
            ->additional(['message' => $msg]);
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
