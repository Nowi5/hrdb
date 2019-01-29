<?php

namespace App\Models;

use App\Models\BaseModel;

class Seed extends BaseModel
{
    protected static $logOnlyDirty = true;

    //use SoftDeletes; // ad in schema $table->softDeletes();

    protected $fillable = [
        'seeder'
    ];
}
