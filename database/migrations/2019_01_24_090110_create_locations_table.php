<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Locations are not used to run any data validation, data are stored as provided

    // Of course I'm aware that a few relationships like city -> state -> country & city -> country are redundant
    // However, this will improve performance when filtering.

    // @todo: All the names will be replaced in a later stage by translation files and just base on id.
    // For make it now faster let start with German and Englisch
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso2');
            $table->string('name')->nullable();
            $table->string('name_long')->nullable(); //@todo: Change to n:m languages soon
            $table->string('name_local')->nullable(); //@todo: Change to n:m languages soon
            $table->string('name_english')->nullable(); //@todo: Change to n:m languages soon
            $table->timestamps();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('symbol')->nullable();
            $table->string('symbol_long')->nullable();
            $table->timestamps();
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iso2')->nullable();
            $table->string('name');
            $table->string('name_long')->nullable();
            $table->string('name_local')->nullable();
            $table->string('name_english')->nullable(); //@todo: Change to n:m languages soon
            $table->unsignedInteger('language_id')->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->timestamps();
        });

        Schema::create('streets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_alternative')->nullable();
            $table->unsignedInteger('city_id');
            $table->timestamps();
        });

        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('code');
            $table->string('name');  //@todo: Change to n:m languages soon
            $table->string('name_alternative')->nullable(); //@todo: Change to n:m languages & names soon
            $table->string('name_english')->nullable();  //@todo: Change to n:m languages soon
            $table->unsignedInteger('country_id')->nullable();
            $table->timestamps();
        });

        // Do we need other levels of clustering villages, cities and districts?

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('name_alternative')->nullable();
            $table->string('name_english')->nullable();
            $table->string('postalcode'); //@todo: Change to n:m relationship
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('country_id');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('line3')->nullable();
            $table->unsignedInteger('street_id')->nullable();
            $table->unsignedInteger('number')->nullable();
            $table->unsignedInteger('city_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('postalcodes');
        Schema::dropIfExists('states');
        Schema::dropIfExists('streets');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('locations');
    }
}