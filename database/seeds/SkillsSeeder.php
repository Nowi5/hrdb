<?php

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillsSeeder extends Seeder
{
    public function run()
    {
        // Inital DB Load of list of Skills
        $this->command->info("Load dump of skills");
        //path to sql file
        $sql = base_path('database/dumps/skills.sql');
        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));

        $this->command->info("Skills Seeder - take some skills in relation");

        $skill_sap          = Skill::firstOrCreate (['name' => 'SAP']);
        $skill_ui5          = Skill::firstOrCreate (['name' => 'Ui5']);
        $skill_programming  = Skill::firstOrCreate (['name' => 'programming']);
        $skill_C            = Skill::firstOrCreate (['name' => 'C++']);
        $skill_software     = Skill::firstOrCreate (['name' => 'Software']);
        $skill_erp          = Skill::firstOrCreate (['name' => 'ERP']);

        $skill_sap->childs()->attach($skill_ui5);
        $skill_programming->childs()->attach($skill_ui5);
        $skill_programming->childs()->attach($skill_C);
        $skill_software->childs()->attach($skill_erp);
        $skill_erp->childs()->attach($skill_sap);

    }
}