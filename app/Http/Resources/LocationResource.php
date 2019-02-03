<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //'line1', 'line2', 'line3', 'number', 'street_id', 'city_id', 'postalcode_id'
        return [
            'id' => $this->id,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'line3' => $this->line3,
            'number' => $this->number,
            'street' => $this->street->name,
            'city'  => $this->city->name,
            'postalcode' => $this->postalcode->code,
            'country'    => $this->country->name,
            //'country' => CountryResource::make($this->country),
            //'streets' => StreetResource::collection($this->whenLoaded('streets')),
            'links'         => [
                'self' => route('api.locations.show', ['location' => $this->id]),
            ],
        ];
    }
}
