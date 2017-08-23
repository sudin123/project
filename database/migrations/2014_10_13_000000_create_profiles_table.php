<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->longText('about')->nullable();
            $table->string('website')->nullable();
            $table->string('phone');
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('street')->nullable();
            $table->string('area');
            $table->unsignedInteger('city')->nullable();
            $table->string('country')->default('Nepal');
            $table->boolean('show_phone')->default(1);
            $table->boolean('show_email')->default(1);
            $table->boolean('suscribe_newsetter')->default(1);
            $table->boolean('verified_phone')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('city')->references('id')->on('cities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
