<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penguna', function (Blueprint $table) {
            $table->uuid('id')->unique()->primary();
            $table->string('negeri_id')->nullable();
            $table->string('agensi_id')->nullable();
            $table->unsignedInteger('peranan_id');
            $table->string('nama');
            $table->string('no_tel')->nullable();
            $table->string('nric')->unique();
            $table->string('alamat')->nullable();
            $table->string('password');
            $table->string('jawatan')->nullable();
            $table->string('email')->unique();
            $table->string('rekod_oleh')->nullable();
            $table->timestamp('tarikh_rekod');
            $table->string('rekod_oleh')->nullable();
            $table->timestamp('tarikh_kemaskini');
            $table->string('kemaskini_oleh')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            // $table->timestamps();

            $table->foreign('peranan_id')->references('id')->on('peranan');
            // $table->foreign('negeri_id')->references('id')->on('negeri');
            $table->foreign('agensi_id')->references('id')->on('agensi');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penguna');
    }
}
