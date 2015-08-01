<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('np_code')->unique();
            $table->string('firstname_en')->nullable();
            $table->string('firstname_ar')->nullable();
            $table->string('lastname_en')->nullable();
            $table->string('lastname_ar')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('active')->default(1);
            $table->boolean('admin')->nullable()->default(0);
            $table->string('city_en')->nullable();
            $table->string('city_ar')->nullable();
            $table->string('country_en')->nullable();
            $table->string('country_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_ar')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
