<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {

        //if (App::environment('local')) {

            $pw = $this->randomPassword();
            $email = env('MAIL_FROM_ADDRESS', 'admin@localhost');
            $user = User::create([
                'name' => 'Admin',
                'email' => $email,
                'invite_id' => null,
                'password' => Hash::make($pw),
                'isAdmin' => 1,
                'email_verified_at' => now()
            ]);

            $this->command->info("User ". $user->name ." with E-Mail ". $user->email . " and PW: ". $pw ." created.");
        /*
        }
        else{
            $this->command->info("Admin user not created - this is only active for local environment");
        }
        */

    }

    function randomPassword() {
        $alphabet = 'ABCDEFGHKMNPQRSTUVWXYZ123456789';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}