<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Program extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('agensi_id')->nullable();
            $table->string('kategori_id')->nullable();
            $table->string('teras_id')->nullable();
            $table->string('manfaat_id')->nullable();
            $table->string('kekerapan_id')->nullable();
            $table->string('status_pelaksanaan');
            $table->string('status_program');
            $table->string('nama');
            $table->string('objektif')->nullable();
            $table->dateTime('tarikh_mula');
            $table->dateTime('tarikh_tamat');
            $table->float('kos')->nullable();
            $table->string('sebab_tidak_aktif');
            $table->string('syarat_program')->nullable();
            $table->string('url')->unique();
            $table->string('logo_agensi')->nullable();
            $table->timestamp('tarikh_rekod');
            $table->string('rekod_oleh')->nullable();
            $table->timestamp('tarikh_kemaskini');
            $table->string('kemaskini_oleh')->nullable();

            // $table->boolean('show_on_homepage')->default(0)->after('date');
            // $table->timestamp('email_verified_at')->nullable();
            // $table->timestamps();

            $table->foreign('rekod_oleh')->references('id')->on('penguna');
            // $table->foreign('agensi_id')->references('id')->on('agensi');
            $table->foreign('kemaskini_oleh')->references('id')->on('penguna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
}
