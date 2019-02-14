<?php

namespace App\Http\Resources;

// use App\Models\Country;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BaseResource;
use App\Http\Resources\CountryResource;

use App\Http\Resources\PostalcodeResource;

class SimpleJobpostingResource extends BaseResource //JsonResource
{
    /**
     * @var array
     */
    protected $withoutFields = [];


    public static function collection($resource)
    {
        return tap(new SimpleJobpostingCollection($resource), function ($collection) {
            $collection->collects = __CLASS__;
        });
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // The simple resource is following as good as possible the indeed api

        /*
        'id','referencenumber','title','description','summary','summary_html','tasks','tasks_html','about_us',
        'about_us_html','benefits','benefits_html','salary','salary_low','salary_high','salary_currency_id',
        'skills','posting_date','delete_date','company_id','jobtype_id','workingtime_id',
        'industry_id','experiencelevel_id','functionalarea_id','location_id','language_id','contact_id',
        'apply_link','pdf_link','video_link','backgroundimage_link','image_link','publisher_id'
        */

        return $this->filterFields([
            'id' => $this->id,
            'referencenumber' => $this->referencenumber,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->apply_link,
            'salary' => $this->salary,
            // 'company' => $this->company->name,

            'keywords' => $this->keywoards .  $this->skills,

            // location has  'line1', 'line2', 'line3', 'number', 'street_id', 'city_id',
            'city' => $this->location->city->name,
            'state' => $this->location->city->state->name,
            'country' => $this->location->city->country->iso2,
            'postalcode' => $this->location->city->postalcode,
            'streetaddress' => $this->location->street->name .' '.$this->location->number,

            // 'sourcename' => $this->publisher->organization->name,
            'email' => $this->publisher->email,

            /*
            'education' => $this->education_id,
            'jobtype' => $this->workingtime_id,
            'category' => $this->functionalarea_id,
            'experience' => $this->experiencelevel_id,
            */
            'links'         => [
                'self' => route('api.simplejobpostings.show', ['jobposting' => $this->id]),
            ],
        ]);
    }

    /**
     * Set the keys that are supposed to be filtered out.
     *
     * @param array $fields
     * @return $this
     */
    public function hide(array $fields)
    {
        $this->withoutFields = $fields;
        return $this;
    }
    /**
     * Remove the filtered keys.
     *
     * @param $array
     * @return array
     */
    protected function filterFields($array)
    {
        return collect($array)->forget($this->withoutFields)->toArray();
    }
}
