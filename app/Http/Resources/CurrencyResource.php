<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //'name', 'symbol', 'symbol_long'
        return [
            'id' => $this->id,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'symbol_long' => $this->symbol_long,
            'links'         => [
                'self' => route('api.currency.show', ['currency' => $this->id]),
            ],
        ];
    }
}
