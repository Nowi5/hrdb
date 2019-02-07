<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\CurrencyCollection;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{

    public function index()
    {
        $currencies = QueryBuilder::for(Currency::class)
            ->allowedFilters('name', 'symbol', 'symbol_long')
            ->paginate();

        return CurrencyResource::collection($currencies);
    }

    public function show(Currency $currency)
    {
        CurrencyResource::withoutWrapping();
        return new CurrencyResource($currency);
    }

    public function store(Request $request)
    {
        //'name', 'symbol', 'symbol_long'
        $data = $request->all();

        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:160'],
            'symbol' => ['required', 'string', 'max:8']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating Currency failed'
            ], 401);
        }

        $currency = Currency::firstOrCreate(
            [
                'name'      => $data['name'],
                'symbol'   => $data['symbol']
            ],
            [
                'symbol_long' => (isset($data['symbol_long']) ? $data['symbol_long'] : '')
            ]
        );

        if ($currency->wasRecentlyCreated === true) {
            $msg = 'Currency successfully created!';
        } else {
            $msg = 'Currency already existed';
        }

        return CurrencyResource::make($currency)
            ->additional(['message' => $msg]);
    }

    // There should be no need to update or delete currencies, instead create new
    /*
    public function update(Request $request, Currency $currency)    
    {
        $currency->update($request->all());
        return response()->json($currency, 200);
    }

    public function delete(Currency $currency)    
    {
        $currency->delete();
        return response()->json(null, 204);
    }
    */

}
