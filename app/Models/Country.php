<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Country extends BaseModel
{
    use LogsActivity;
    protected $table = 'countries';

    protected $fillable = [
       'iso2', 'name', 'name_long', 'name_local', 'name_english', 'language_id', 'currency_id'
    ];

    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'language_id');
    }

}
