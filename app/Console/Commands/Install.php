<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Basic Installation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $bar = $this->output->createProgressBar(5);

        //
        $this->info("Running install \n");
        Artisan::call('key:generate');
        $bar->advance();
        Artisan::call('migrate');
        $bar->advance();
        Artisan::call('db:seed');
        $bar->advance();
        Artisan::call('passport:install');
        $bar->advance();
        Artisan::call('passport:keys');
        $bar->advance();
        //Artisan::call('passport:client', ['--personal' => 'default']);

        $bar->finish();

        $this->info("\n Install complete");

        $this->info("\n Please run passport:client --personal manually");

    }
}
