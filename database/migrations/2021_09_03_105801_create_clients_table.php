<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('app_clients', function (Blueprint $table) {
            $table->uuid('cli_id')->unique()->primary();

            $table->string('cli_name', 150);
            $table->enum('cli_type', ['CPF', 'CNPJ']);
            $table->string('cli_document', 45);
            $table->json('cli_address');
            $table->json('cli_contact');
            $table->integer('cli_id_external');
            $table->boolean('cli_active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_clients');
    }
}
