<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('website')->unique()->nullable();
            $table->string('logo_url')->nullable();
            $table->text('description')->nullable(); // Can include HTML?
            $table->string('domain')->nullable(); // esp. for mails mail@company.com = company.com

            // Main Location HQ, other locations can be added later
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');

            //$table->unsignedInteger('industry_id')->nullable();
            //$table->unsignedInteger('employees')->nullable(); // count of employees +10000
            //$table->unsignedInteger('type_id')->nullable(); // public, private, ...
            $table->unsignedInteger('founded')->nullable();

            //Specialties //like list of keywords?

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('jobpostings', function($table) {
            $table->unsignedInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
        });

        Schema::table('users', function($table) {
            $table->unsignedInteger('organization_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
        Schema::table('jobpostings', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');
        });
    }
}
