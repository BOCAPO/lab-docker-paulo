<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('hermes_profiles', function (Blueprint $table) {
            $table->uuid('prf_id')->unique()->primary();
            $table->string('prf_name', 60)->unique();
            $table->json('prf_permission')->nullable();
            $table->longtext('prf_description')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hermes_profiles');
    }
}
