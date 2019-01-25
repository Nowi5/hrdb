<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Country extends BaseModel
{

    protected $table = 'countries';

    protected $fillable = [
       'name', 'name_long', 'name_local', 'name_english'
    ];

    public function language()
    {
        return $this->belongsTo('Models\Language', 'language_id');
    }

}
