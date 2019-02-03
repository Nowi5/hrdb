<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BaseResource;

use App\Http\Resources\LanguageResource;
use App\Http\Resources\CurrencyResource;

class CountryResource extends BaseResource //JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'iso2' => $this->iso2, //todo: We need a better name instead of iso2
            'name' => $this->name,
            'name_long' => $this->name_long,
            // as name_englisch is 99% empty, just show it if the result is not null
            'name_englisch' => $this->when($this->name_englisch != null, $this->name_englisch),
            'language' => $this->when($this->language != null, LanguageResource::make($this->language)),
            'currency' => $this->when($this->currency != null, CurrencyResource::make($this->currency)),
            'links'         => [
                'self' => route('api.countries.show', ['country' => $this->id]),
            ],
        ];
    }
}
