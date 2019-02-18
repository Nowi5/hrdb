<?php

namespace App\Models;

use App\Models\BaseModel;

class Skill extends BaseModel
{

    protected $table = 'skills';

    protected $fillable = [
        'name'
    ];

    public function childs()
    {
        return $this->belongsToMany('App\Skill', 'skills_skills', 'parent_skill_id');
    }

    public function parents()
    {
        return $this->belongsToMany('App\Skill', 'skills_skills', 'child_skill_id');
    }


}
