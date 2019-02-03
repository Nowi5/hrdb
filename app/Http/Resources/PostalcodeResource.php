<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostalcodeResource extends JsonResource
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
            'code' => $this->code,

            'cities' => CityResource::collection($this->cities),

            'links'         => [
                'self' => route('api.postalcodes.show', ['postalcode' => $this->id]),
            ],
        ];
    }
}
