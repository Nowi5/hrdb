<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
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
            'id'            => $this->id,
            'name'          => $this->name,
            'website'       => $this->website,
            'logo_url'      => $this->logo_url,
            'description'   => $this->description,
            'founded'       => $this->founded,
            'location'      => LocationResource::make($this->location),
            'jobpostings'   => SimpleJobpostingResource::collection($this->whenLoaded('jobpostings')),
            'users'         => UserResource::collection($this->whenLoaded('users')),
            'links'         => [
                'self' => route('api.organizations.show', ['organization' => $this->id]),
            ],
        ];
    }
}
