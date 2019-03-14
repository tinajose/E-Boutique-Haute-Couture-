<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('log_id');
            $table->string('login_email');
            $table->string('login_password');
            $table->string('login_online');
            $table->string('login_status');
            $table->string('login_type');
            
            $table->bigInteger('reg_id')->unsigned();
            $table->foreign('reg_id')->references('reg_id')->on('registers');
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
        Schema::dropIfExists('logs');
    }
}
