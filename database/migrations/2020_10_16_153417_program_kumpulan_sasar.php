<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProgramKumpulanSasar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_kumpulan_sasar', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('kumpulan_sasar_id')->nullable();
            $table->string('program_id')->nullable();
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
        Schema::dropIfExists('program_kumpulan_sasar');
    }
}
