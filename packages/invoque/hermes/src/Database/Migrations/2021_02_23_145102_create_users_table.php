<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('hermes_users', function (Blueprint $table) {
            $table->uuid('usr_id')->unique()->primary();

            $table->uuid('usr_prf_id');
            $table->foreign('usr_prf_id')->references('prf_id')->on('hermes_profiles');

            $table->string('usr_username', 60)->unique();
            $table->string('usr_password', 100);
            $table->boolean('usr_active')->default(1);
            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hermes_users');
    }
}
