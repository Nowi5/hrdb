<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StreetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'name', 'name_alternative'
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_alternative' => $this->when($this->name_alternative != null, $this->name_alternative),
            'city' => CityResource::make($this->city),
            'links'         => [
                'self' => route('api.streets.show', ['street' => $this->id]),
            ],
        ];
    }
}
