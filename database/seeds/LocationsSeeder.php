<?php

use Illuminate\Database\Seeder;


class LocationsSeeder extends Seeder
{
    public function run()
    {
        $this->command->info("Load dump of Locations");
        //path to sql file
        $sql = base_path('database/dumps/locations.sql');
        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));

        // Germany
        $this->command->info("Load dump of German Locations");
        //path to sql file
        $sql = base_path('database/dumps/locations-germany.sql');
        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));
    }
}