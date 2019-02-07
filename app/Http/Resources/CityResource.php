<?php

namespace App\Http\Resources;

// use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BaseResource;
use App\Http\Resources\CountryResource;

use App\Http\Resources\PostalcodeResource;

class CityResource extends BaseResource //JsonResource
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
            'name' => $this->name,
            'postalcode' => $this->postalcode,
            'state' => StateResource::make($this->state),
            'country' => CountryResource::make($this->country),
            'streets' => StreetResource::collection($this->whenLoaded('streets')),
            'links'         => [
                'self' => route('api.cities.show', ['city' => $this->id]),
            ],
        ];
    }
}
