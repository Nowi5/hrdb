<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model //extends Model
{
    // https://docs.spatie.be/laravel-activitylog/v3/advanced-usage/logging-model-events
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
}
