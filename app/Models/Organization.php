<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Activitylog\Traits\LogsActivity;

class Organization extends BaseModel
{
    use LogsActivity;
    protected $table = 'organizations';

    protected $fillable = [
        'name', 'website', 'logo_url', 'description', 'domain', 'location_id', 'founded'
    ];

    public function users(){
        return $this->hasMany('App\Models\Users', 'organization_id');
    }

    public function jobpostings(){
        return $this->hasMany('App\Models\Jobposting', 'organization_id');
    }

    public function location(){
        return $this->belongsTo('App\Models\Location', 'location_id');
    }
}
