<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('state')->default('active');
            $table->string('status')->default('pending');
            
            $table->enum('period', ['hourly', 'daily', 'weekly', 'monthly', 'yearly']);
            $table->enum('time_period', ['am', 'pm']);
            $table->time('time');
            $table->string('callback_url');
            $table->string('service_response')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('tasks');
    }
}
