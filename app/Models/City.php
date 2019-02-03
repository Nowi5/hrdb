<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class City extends BaseModel
{
    use LogsActivity;
    protected $table = 'cities';

    protected $fillable = [
        'name', 'name_alternative', 'name_english'
    ];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function postalcode()
    {
        return $this->belongsTo('App\Models\Postalcode', 'postalcode_id');
    }

    /*
    public function postalcodes(){
        return $this->hasMany('App\Models\Postalcode', 'city_id');
    }
    */

    public function streets()
    {
        return $this->hasMany('App\Models\Street', 'city_id');
    }
}
