<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'name', 'name_alternative', 'name_english', 'country_id'
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_alternative' => $this->when($this->name_alternative != null, $this->name_alternative),
            'name_english' => $this->when($this->name_english != null, $this->name_english),
            'country' => CountryResource::make($this->whenLoaded('country')),
            'links'         => [
                'self' => route('api.states.show', ['state' => $this->id]),
            ],
        ];
    }
}
