<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class State extends BaseModel
{
    use LogsActivity;

    protected $table = 'states';

    protected $fillable = [
        'name', 'name_alternative', 'name_english', 'country_id'
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

}
