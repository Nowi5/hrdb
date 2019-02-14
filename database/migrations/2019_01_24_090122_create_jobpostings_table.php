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
            // Example indeed: http://techdocs.indeedeng.io/xml-job-feed/

            $table->increments('id');
            /** Some companyies have internal IDs */
            $table->string('referencenumber')->nullable(); // A unique identifying number for this job.

            $table->string('title'); //The title of the job.
            $table->text('description')->nullable();
            $table->text('keywords')->nullable(); // Not visible list of comma separate keywords to improve search

            // beside description, here the diescription can be split up in multiple fields, for more detailed data nuggets
            $table->text('summary')->nullable(); // No HTML
            $table->text('summary_html')->nullable();
            $table->text('tasks')->nullable();
            $table->text('tasks_html')->nullable();
            $table->text('about_us')->nullable();
            $table->text('about_us_html')->nullable();
            $table->text('benefits')->nullable();
            $table->text('benefits_html')->nullable();

            /** Salary */
            $table->string('salary')->nullable(); // free text or sum without & with currency //The salary offered for this job.
            $table->integer('salary_low')->nullable();
            $table->integer('salary_high')->nullable();
            $table->unsignedInteger('salary_currency_id')->nullable();

            /** Skills (n:m) will be also added via other table */
            $table->text('skills')->nullable(); // free text, in best case separated with comma ,

            $table->date('posting_date')->nullable(); //date: The date on which this job was first published.

            $table->date('delete_date')->nullable();

            /**
            8 Arbeitsbereiche?
            Persönlichkeitsdimensionen nach Jung?
             **/

            /** Company / Organization (will be added later) */
            //$table->unsignedInteger('company_id');

            /**  Contract, Internship, Temp, Other */ //api - type
            //$table->unsignedInteger('jobtype_id')->nullable();

            /** Part Time, Full Time */
            //$table->unsignedInteger('workingtime_id')->nullable();
            // jobtype // The type (full- or part-time) of this job.

            /** Industry */
            //$table->unsignedInteger('industry_id')->nullable();

            /** Experience Level */
            //$table->unsignedInteger('experiencelevel_id')->nullable(); //level with without leading experience // 	The desired experience for this job.

            // education // The desired education level for this job Bacehlor

            /** Functional Area */
            //$table->unsignedInteger('functionalarea_id')->nullable();

            $table->unsignedInteger('location_id')->nullable(); // complete address
            //city - The city in which this job is located.
            //state - The state in which this job is located. Use the appropriate postal abbreviation.
            //country - The postal code in which this job is located.
            // streetaddress The street address of the job’s primary work location. Please include the street name and number. If possible, provide the full address including city, state, and postal code. [1234 Sunny Lane
            //Austin, TX 78750]

            /** Language Identifier */
            $table->unsignedInteger('language_id');

            /** Contact Details (can be harmonized later, but can be very different per posting, even within the same company*/
            //$table->unsignedInteger('contact_id')->nullable();
            /*$table->string('contact_text')->nullable(); // free text, can be summary of name, mail and phone or any other text
            $table->string('contact_name')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('contact_phone')->nullable();*/

            /** Registration link, where can he access e.g. the apply button */
            $table->string('apply_link')->nullable();

            /** Link to full PDF (for now no PDF upload) */
            $table->string('pdf_link')->nullable();

            /** Optional link to video, background & picture */
            $table->string('video_link')->nullable();
            $table->string('backgroundimage_link')->nullable();
            $table->string('image_link')->nullable();

            /** Who of the user has uploaded - publisher_id instead of user_id */
            $table->unsignedInteger('publisher_id'); // sourcename - can it be different as the person who uploads?

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
