<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KumpulanSasar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kumpulan_sasar', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('nama')->nullable();
            $table->timestamp('tarikh_rekod');
            $table->string('rekod_oleh')->nullable();
            $table->timestamp('tarikh_kemaskini');
            $table->string('kemaskini_oleh')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kumpulan_sasar');
    }
}
