<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Language extends BaseModel
{
    use LogsActivity;

    protected $table = 'languages';

    protected $fillable = [
        'iate', 'name', 'name_long', 'name_lcoal', 'name_english'
    ];
}
