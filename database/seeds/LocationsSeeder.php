<?php

use Illuminate\Database\Seeder;
//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $this->command->info("Load dump of Locations");
        //path to sql file
        $sql = base_path('database/dumps/locationss.sql');

        //collect contents and pass to DB::unprepared
        DB::unprepared(file_get_contents($sql));

    }
}