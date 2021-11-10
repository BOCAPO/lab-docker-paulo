<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_register', function (Blueprint $table) {
            $table->uuid('reg_id')->unique()->primary();

            $table->uuid('reg_usr_id');
            $table->foreign('reg_usr_id')->references('usr_id')->on('hermes_users');

            $table->string('reg_name', 150);
            $table->string('reg_phone', 18);
            $table->string('reg_email');
            $table->integer('reg_id_external')->nullable();
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
        Schema::dropIfExists('app_register');
    }
}
