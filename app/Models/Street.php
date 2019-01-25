<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Street extends BaseModel
{

    protected $table = 'streets';

    protected $fillable = [
        'name', 'name_alternative'
    ];

    public function city()
    {
        return $this->belongsTo('Models\City', 'city_id');
    }
}
