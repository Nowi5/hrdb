<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    // @todo:
    // does not work as it overwritten by child class - need to check for global way
    // idea is to add to collections the link from index to show and show filter options on collection

}
