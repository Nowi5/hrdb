<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Currency extends BaseModel
{

    protected $table = 'currencies';

    protected $fillable = [
        'name', 'symbol', 'symbol_long'
    ];
}
