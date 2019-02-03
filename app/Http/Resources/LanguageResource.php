<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 'iso2', 'name', 'name_long', 'name_lcoal', 'name_english'
        return [
            'id' => $this->id,
            'iso2' => $this->iso2,
            'name' => $this->name,
            'name_long' => $this->when($this->name_long != null, $this->name_long),
            'name_lcoal' => $this->when($this->name_lcoal != null, $this->name_lcoal),
            'name_english' => $this->when($this->name_english != null, $this->name_english),
            'links'         => [
                'self' => route('api.languages.show', ['language' => $this->id]),
            ],
        ];
    }
}