<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Postalcode extends BaseModel
{

    protected $table = 'Postalcodes';

    protected $fillable = [
        'code', 'city_id'
    ];
}
