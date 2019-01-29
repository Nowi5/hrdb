<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Currency extends BaseModel
{
    use LogsActivity;
    protected $table = 'currencies';

    protected $fillable = [
        'name', 'symbol', 'symbol_long'
    ];
}
