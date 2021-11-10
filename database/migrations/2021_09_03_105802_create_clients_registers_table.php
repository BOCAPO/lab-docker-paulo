<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsRegistersTable extends Migration
{
    public function up()
    {
        Schema::create('app_clients_register', function (Blueprint $table) {
            $table->uuid('clr_reg_id');
            $table->foreign('clr_reg_id')->references('reg_id')->on('app_register');

            $table->uuid('clr_cli_id');
            $table->foreign('clr_cli_id')->references('cli_id')->on('app_clients');
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_clients_register');
    }
}
