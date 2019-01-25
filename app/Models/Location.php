<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Location extends BaseModel
{

    protected $table = 'locations';

    protected $fillable = [
        'line1', 'line2', 'line3', 'number', 'street_id', 'city_id', 'postalcode_id'
    ];

    public function postalcode()
    {
        return $this->belongsTo('Models\Postalcode', 'postalcode_id');
    }

    public function street()
    {
        return $this->belongsTo('Models\Street', 'street_id');
    }

    public function city()
    {
        return $this->belongsTo('Models\City', 'city_id');
    }
}
