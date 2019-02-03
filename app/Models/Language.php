<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Language extends BaseModel
{
    use LogsActivity;

    protected $table = 'languages';

    protected $fillable = [
        'iso2', 'name', 'name_long', 'name_lcoal', 'name_english'
    ];
}
