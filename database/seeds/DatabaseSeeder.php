<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Seed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $executedseeder;

    // This seed can be started via 'php artisan db:seed'
    // It is also used as installation routine in the module installer
    // Each Seeder is just performed once, status saved in DB
    public function run()
    {
        $this->sqlTest();

        // Get all Seeders from DB
        $this->executedseeder = Seed::all()->pluck('seeder')->toArray();

        $this->runSeeder(LocationsSeeder::class);

    }

    private function runSeeder($class){
        if(!in_array($class, $this->executedseeder)){
            $this->command->info("Run Seeder: ".$class );

            // try {
            $this->call($class);
            /* }
             catch(Exception $e){
                 $this->command->error("Error with Seeder '". $class ."'." );
                 $this->command->error( $e->getMessage() );
             } */

            // Add to table seeder
            array_push($this->executedseeder, $class);

            $seed = Seed::create(
                ['seeder' => $class]
            );
        }
        else{
            $this->command->info("Seeder '". $class ."' not performed, as it were already executed in the past." );
        }
    }

    private function sqlTest(){
        try {
            DB::connection()->getPdo();
            //var_dump(DB::connection()->getPdo());
            $this->command->info("DB Connection to '".DB::connection()->getDatabaseName()."' established. Starting seed");
        } catch (\Exception $exception) {
            die("Could not connect to the database.  Please check your configuration. Error:" . $exception->getMessage() );
        }

        if(!Schema::hasTable('seeds')) {
            $this->command->info("Table seeds not located, please run migration first");
        }
    }
}
