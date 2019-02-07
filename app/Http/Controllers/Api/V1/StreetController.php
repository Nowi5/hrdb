<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use App\Models\City;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\StreetCollection;
use App\Http\Resources\StreetResource;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\CityRepositoryInterface;

class StreetController extends Controller
{
    public function __construct(CityRepositoryInterface $city)
    {
        $this->city = $city;
    }

    public function index()
    {
        $streets = QueryBuilder::for(Street::class)
            ->allowedFilters('name', 'alternative_name', 'city.name', 'city.id', 'city.postalcode')
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
        $data = $request->all();
        $city = $this->city->getOrCreate($data, true);
        $data['city_id'] = $city->id;

        $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'name_alternative' => ['string', 'max:255'],
            'city_id'   => ['required', 'integer']
            //@todo: Add Valdiator to ensure that city paramter are given
            // https://stackoverflow.com/questions/27875366/laravel-validation-one-of-two-fields-must-be-filled
            // https://stackoverflow.com/questions/34393279/nested-array-validation-laravel
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating street failed'
            ], 401);
        }

        //$street = Street::create($data);
        //$street->save();

        $street = Street::firstOrCreate(
            [
                'name'      => $data['name'],
                'city_id'   => $data['city_id']
            ],
            [
                'name_alternative' => (isset($data['name_alternative']) ? $data['name_alternative'] : '')
            ]
        );

        if ($street->wasRecentlyCreated === true) {
            $msg = 'Street successfully created!';
        } else {
            $msg = 'Street already existed!';
        }

        return StreetResource::make($street)
            ->additional(['message' => $msg]);

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
