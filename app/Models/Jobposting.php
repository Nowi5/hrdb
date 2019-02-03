<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Jobposting extends BaseModel
{

    protected $table = 'jobpostings';

    protected $fillable = [
        'public_id', 'title', 'summary', 'summary_html', 'tasks', 'tasks_html', 'about_us', 'about_us_html',
        'benefits', 'benefits_html', 'salary', 'salary_low', 'salary_high', 'salary_currency_id', 'skills', 'postig_date',
        'company_id', 'workingtime_id', 'industry_id', 'experiencelevel_id', ' functionalarea_id',
        'location_id', 'contact_text', 'contact_name', 'contact_mail', 'contact_phone', 'apply_link', 'pdf_link'
    ];

    public function currency()
    {
        return $this->belongsTo('App\Models\Currenxy', 'alary_currency_id');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Models\User', 'publisher_id');
    }

    public function location(){
        return $this->hasMany('App\Models\Location', 'location_id');
    }

    // @Todo: Add relationship for Workingtime, Industy, Exerpeiencelevel, Funtionalarea, Company
    // @Todo: Use Users's Organization as Publisher and not user_id
}
