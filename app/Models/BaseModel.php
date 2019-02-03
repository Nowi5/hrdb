<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

abstract class BaseModel extends Model //extends Model
{
    // https://docs.spatie.be/laravel-activitylog/v3/advanced-usage/logging-model-events
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
}
