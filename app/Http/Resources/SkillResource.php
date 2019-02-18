<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
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
            'name' => $this->name,
            'parents' => SkillResource::collection($this->whenLoaded('parents')),
            'childs' => SkillResource::collection($this->whenLoaded('childs')),
            'links'         => [
                'self' => route('api.skills.show', ['skill' => $this->id]),
            ],
        ];
    }
}
