<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Location extends BaseModel
{
    // Location = Address
    protected $table = 'locations';

    protected $fillable = [
        'line1', 'line2', 'line3', 'number', 'street_id', 'city_id',
    ];

    public function street()
    {
        return $this->belongsTo('App\Models\Street', 'street_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }


}
