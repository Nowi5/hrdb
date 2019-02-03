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

    // Yes, this is double to city, but helps for faster filtering
    public function postalcode()
    {
        return $this->belongsTo('App\Models\Postalcode', 'postalcode_id');
    }

    public function street()
    {
        return $this->belongsTo('App\Models\Street', 'street_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
