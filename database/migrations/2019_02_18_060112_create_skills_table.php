<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //The name of the skill.

            $table->unsignedInteger('language_id')->nullable(); //in case it is language specific
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('skills_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_skill_id');
            $table->unsignedInteger('child_skill_id');
            $table->foreign('parent_skill_id')->references('id')->on('skills');
            $table->foreign('child_skill_id')->references('id')->on('skills');
            // we do not seperate siblings, as we would be able to filter by same parent
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
        Schema::dropIfExists('skills_skills');
    }
}
