<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Street extends BaseModel
{
    use LogsActivity;

    protected $table = 'streets';

    protected $fillable = [
        'name', 'name_alternative', 'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
