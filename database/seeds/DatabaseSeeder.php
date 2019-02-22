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

        // run seeders by class
        $this->runSeeder(UsersSeeder::class);
        $this->runSeeder(LocationsSeeder::class);
        $this->runSeeder(SkillsSeeder::class);
        $this->runSeeder(JobpostingsSeeder::class);

        $this->command->info("");

    }

    private function runSeeder($class){
        if(!in_array($class, $this->executedseeder)){
            $this->command->info("");
            $this->command->info("Run Seeder: ".$class );

            // try {

                Eloquent::unguard(); // does temporarily disable the mass assignment protection of the model
                $this->call($class);
                Eloquent::reguard();
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
            DB::commit(); // In case a Seeder is not closed, it should not impact the next loop
            $this->command->info("Seeder '".$class."' successfully finished." );
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
