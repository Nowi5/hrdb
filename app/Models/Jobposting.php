<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Jobposting extends BaseModel
{

    protected $table = 'jobpostings';

    protected $fillable = [
        'id','referencenumber','title','description','summary','summary_html','tasks','tasks_html','about_us',
        'about_us_html','benefits','benefits_html','salary','salary_low','salary_high','salary_currency_id',
        'skills','posting_date','delete_date','company_id','jobtype_id','workingtime_id',
        'industry_id','experiencelevel_id','functionalarea_id','location_id','language_id','contact_id',
        'apply_link','pdf_link','video_link','backgroundimage_link','image_link','publisher_id'
    ];

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'salary_currency_id');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Models\User', 'publisher_id');
    }

    public function location(){
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    // @Todo: Add relationship for Workingtime, Industy, Exerpeiencelevel, Funtionalarea, Company
    // @Todo: Use Users's Organization as Publisher and not user_id
}
