<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobpostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First we are focusing on functionality and a basic data set, data completeness
        // and quality will happen in a second step, therefore most of the data are optional (nullable).

        Schema::create('jobpostings', function (Blueprint $table) {
            $table->increments('id');
            /** Some companyies have internal IDs */
            $table->string('public_id')->nullable();

            $table->string('title');
            $table->text('summary')->nullable(); // No HTML
            $table->text('summary_html')->nullable();
            $table->text('tasks')->nullable();
            $table->text('tasks_html')->nullable();
            $table->text('about_us')->nullable();
            $table->text('about_us_html')->nullable();
            $table->text('benefits')->nullable();
            $table->text('benefits_html')->nullable();

            /** Salary */
            $table->string('salary')->nullable(); // free text or sum without & with currency
            $table->integer('salary_low')->nullable();
            $table->integer('salary_high')->nullable();
            $table->unsignedInteger('salary_currency_id')->nullable();

            /** Skills (n:m) will be also added via other table */
            $table->text('skills'); // free text, in best case separated with comma ,

            $table->date('posting_date')->nullable();

            /** Company / Organization (will be added later) */
            //$table->unsignedInteger('company_id');

            /**  Contract, Internship, Temp, Other */
            $table->unsignedInteger('type_id')->nullable();
            /** Part Time, Full Time */
            $table->unsignedInteger('workingtime_id')->nullable();

            /**  */
            $table->unsignedInteger('industry_id')->nullable();

            $table->unsignedInteger('experiencelevel_id')->nullable();

            $table->unsignedInteger('functionalarea_id')->nullable();

            $table->string('location_id')->nullable(); // complete address
            $table->unsignedInteger('language_id')->nullable();

            /** Contact Details (can be harmonized later, but can be very different per posting, even within the same company*/
            $table->string('contact_text')->nullable(); // free text, can be summary of name, mail and phone or any other text
            $table->string('contact_name')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('contact_phone')->nullable();

            /** Registration link, where can he access e.g. the apply button */
            $table->string('apply_link')->nullable();

            /** Link to full PDF (for now no PDF upload) */
            $table->string('pdf_link')->nullable();

            /** Who of the user has uploaded - publisher_id instead of user_id */
            $table->unsignedInteger('publisher_id');

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
        Schema::dropIfExists('jobpostings');
    }
}
