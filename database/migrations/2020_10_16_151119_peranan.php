<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peranan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peranan', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('akses_matrik_id')->nullable();
            $table->string('nama')->unique();
            $table->text('description')->nullable();
            $table->timestamp('tarikh_rekod');
            $table->string('rekod_oleh')->nullable();
            $table->timestamp('tarikh_kemaskini');
            $table->string('kemaskini_oleh')->nullable();

            // $table->foreign('akses_matrik_id')->references('id')->on('akses_matrik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peranan');
    }
}
