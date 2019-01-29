<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BaseResource;

class UserResource extends BaseResource //JsonResource
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
            'created_at' => (string) $this->created_at,
            'links'         => [
                'self' => route('api.users.show', ['user' => $this->id]),
            ],
        ];

    }
}
