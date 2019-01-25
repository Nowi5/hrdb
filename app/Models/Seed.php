<?php

namespace App\Models;

use App\Models\BaseModel;

class Seed extends BaseModel
{
    use UsesSystemConnection;
    //use UsesWebsiteColumn; // Renant saved in website id column
    use LogsActivity;

    use HasEncryptedAttributes;

    protected static $logOnlyDirty = true;

    //use SoftDeletes; // ad in schema $table->softDeletes();

    protected $fillable = [
        'seeder'
    ];
}
