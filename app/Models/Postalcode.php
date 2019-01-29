<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Postalcode extends BaseModel
{
    use LogsActivity;
    protected $table = 'Postalcodes';

    protected $fillable = [
        'code', 'city_id'
    ];
}
