<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use App\Models\Currency;
use App\Models\Language;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class CountryController extends Controller
{
    public function __construct(CurrencyRepositoryInterface $currency, LanguageRepositoryInterface $language)
    {
        $this->currency = $currency;
        $this->language = $language;
    }

    public function index()
    {
        $countries = QueryBuilder::for(Country::class)
            ->allowedFilters('name', 'currency.id', 'language.id') //@todo: Add further filters
            ->allowedIncludes('language', 'currency')
            ->paginate();

        return CountryResource::collection($countries);
    }

    public function show(Country $Country)
    {
        CountryResource::withoutWrapping();
        return new CountryResource($Country);
    }

    // 'name', 'name_long', 'name_local', 'name_english', 'language_id', 'currency_id'
    public function store(Request $request)
    {
        $data = $request->all();

        // Get related Currency
        $currency = $this->currency->getOrCreate($data, false);
        if($currency == null){
            $data['currency_id'] = null;
        }
        else{
            $data['currency_id'] = $currency->id;
        }

        // Get related Language
        $language = $this->language->getOrCreate($data, false);
        if($language == null){
            $data['language_id'] = null;
        }
        else{
            $data['language_id'] = $currency->id;
        }

        // Check for input data
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'name_long' => ['string', 'max:255'],
            'name_english' => ['string', 'max:255'],
            //'language_id'   => ['integer'],
            //'language_id'   => ['integer']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating Country failed'
            ], 401);
        }

        //$country = Street::create($data);
        //$country->save();

        // 'iso2', 'name', 'name_long', 'name_local', 'name_english', 'language_id', 'currency_id'
        $country = Country::firstOrCreate(
            [
                'name'      => $data['name'],
            ],
            [
                'name_long' => (isset($data['name_long']) ? $data['name_long'] : ''),
                'name_local' => (isset($data['name_local']) ? $data['name_local'] : ''),
                'name_english' => (isset($data['name_english']) ? $data['name_english'] : ''),
                'iso2' => (isset($data['iso2']) ? $data['iso2'] : '')
            ]
        );

        if ($country->wasRecentlyCreated === true) {
            $msg = 'Successfully created Country!';
        } else {
            $msg = 'Country already existed';
        }

        return CountryResource::make($country)
            ->additional(['message' => $msg]);
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
