<?php

use Illuminate\Database\Seeder;
use App\Models\Jobposting;
use App\Models\Skill;

class JobpostingsSeeder extends Seeder
{
    public function run()
    {
        $this->command->info("Create Example Jobposting");

        $skill_programming  = Skill::firstOrCreate (['name' => 'programming']);

        $jobposting = Jobposting::create([
            // 'id'=> ,
            'referencenumber'=> 'xxx001',
            'title'=> 'HRDB Developer',
            'description'=> 'Developer for HRDB',
            'summary'=> 'We need a developer for HRDB',
            'summary_html'=> 'We need a developer for <strong>HRDB</strong>',
            'tasks'=> 'Developing important things',
            //'tasks_html'=> ,
            //'about_us'=> ,
            //'about_us_html'=> ,
            //'benefits'=> ,
            //'benefits_html'=> ,
            'salary'=> '60000€',
            //'salary_low'=> ,
            //'salary_high'=> ,
            //'salary_currency_id'=> ,
            //'skills'=> ,
            //'posting_date'=> ,
            //'delete_date'=> ,
            //'company_id'=> ,
            //'jobtype_id'=> ,
            //'workingtime_id'=> ,
            //'industry_id'=> ,
            //'experiencelevel_id'=> ,
            //'functionalarea_id'=> ,
            //'location_id'=> ,
            'language_id'=> 1,
            //'contact_id'=> ,
            'apply_link'=> 'https://test.com',
            //'pdf_link'=> ,
            //'video_link'=> ,
            //'backgroundimage_link'=> ,
            //'image_link'=> ,
            'publisher_id' => 1
        ]);

        $jobposting->skills()->attach($skill_programming);
    }
}