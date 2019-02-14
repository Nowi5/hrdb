<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;

use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\SimpleJobpostingCollection;
use App\Http\Resources\SimpleJobpostingResource;

use App\Models\Country;
use App\Models\Jobposting;
use App\Models\State;
use App\Models\Location;
use App\Models\Street;
use App\Models\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class SimpleJobpostingController extends Controller
{
    public function __construct(CurrencyRepositoryInterface $currency, LanguageRepositoryInterface $language)
    {
        $this->currency = $currency;
        $this->language = $language;
    }

    public function index()
    {
        //@todo: How to manipulate request to map API city to location.city.name?
        $jobpostings = QueryBuilder::for(Jobposting::class)
            ->allowedFilters('title', 'currency.id', 'location.city.name', 'location.country.name')
            ->allowedIncludes('location' ,'location.city', 'location.street')
            ->paginate();

        return SimpleJobpostingResource::collection($jobpostings)
            ->hide(['description', 'summary', 'streetaddress', 'company', 'referencenumber', 'email', 'salary', 'url']);
    }

    public function show($simplejobpostingid)
    {
        $jobposting = Jobposting::find($simplejobpostingid);

        SimpleJobpostingResource::withoutWrapping();
        return new SimpleJobpostingResource($jobposting);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Check for input data
        $validator = Validator::make($data,[
            'referencenumber' => ['string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'url' => ['required', 'string', 'max:255'],
            'salary' => ['string', 'max:255'],
            // 'company' => $this->company->name,
            'keywords' => ['string'],
            // location has  'line1', 'line2', 'line3', 'number', 'street_id', 'city_id',
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'streetaddress' => ['required', 'string', 'max:255'],
            // 'sourcename' => $this->publisher->organization->name,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating Jobposting failed'
            ], 401);
        }

        // Map data back to Table structure (API != DB)
        $data['apply_link'] = $data['url'];

        // location has  'line1', 'line2', 'line3', 'number', 'street_id', 'city_id',
        /*
        'city' => $this->location->city->name,
        'state' => $this->location->city->state->name,
        'country' => $this->location->city->country->iso2,
        'postalcode' => $this->location->city->postalcode,
        'streetaddress' => $this->location->street->name .' '.$this->location->number,
        */

        $country = Country::where('iso2', $data['country'])->firstOrFail();

        $language_id = $country->language_id;

        $state = State::firstOrCreate([
                'name' => $data['state'],
                'country_id' => $country->id
            ]);

        $city = City::firstOrCreate([
                'name' => $data['city'],
                'country_id' => $country->id,
                'state_id' => $state->id
            ]);

        // split street
        // https://gist.github.com/benvds/350404
        // Splits an address string containing a street, number and number addition

        $aMatch         = array();
        $pattern        = '#^([\w[:punct:] ]+) ([0-9]{1,5})([\w[:punct:]\-/]*)$#';
        $matchResult    = preg_match($pattern, $data['streetaddress'], $aMatch);

        $streetname        = (isset($aMatch[1])) ? $aMatch[1] : '';
        $number         = (isset($aMatch[2])) ? $aMatch[2] : '';
        $numberAddition = (isset($aMatch[3])) ? $aMatch[3] : '';

         $street = Street::firstOrCreate([
                'name' => $streetname,
                'city_id' => $city->id
            ]);

        $location = Location::firstOrCreate([
                'street_id' => $street->id,
                'city_id' => $city->id,
                'number' => $number.$numberAddition,
            ]);

        // Get related Language by country
        $data['language_id'] = $country->language_id;

        $jobposting = Jobposting::create(
           [
               'referencenumber' => $data['referencenumber'],
               'title' => $data['title'],
               'description' => $data['title'],
               'apply_link' => $data['apply_link'],
               'salary' => $data['salary'],
               'keywords' => $data['keywords'],
               'location_id' => $location->id,
               'language_id' => $language_id,
               'publisher_id' => auth('api')->user()->id
           ]
        );

        $msg = 'Jobposting successfully created!';
        return SimpleJobpostingResource::make($jobposting)
            ->additional(['message' => $msg]);
    }

    public function update(Request $request, Jobposting $jobposting)
    {
        // No update
    }

    public function delete(Jobposting $jobposting)
    {
        // @todo: Check of this is the publisher, only publisher can delete
        $jobposting->delete();
        return response()->json(null, 204);
    }
}
