<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class City extends BaseModel
{

    protected $table = 'cities';

    protected $fillable = [
        'name', 'name_alternative', 'name_english'
    ];

    public function region()
    {
        return $this->belongsTo('Models\Region', 'region_id');
    }

    public function country()
    {
        return $this->belongsTo('Models\Country', 'country_id');
    }

    public function postalcodes(){
        return $this->hasMany('Models\Postalcodes', 'city_id');
    }
}
