<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Postalcode extends BaseModel
{
    use LogsActivity;
    protected $table = 'postalcodes';

    protected $fillable = [
        'code', 'city_id'
    ];

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
