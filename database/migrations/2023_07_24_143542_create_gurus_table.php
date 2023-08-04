<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->string('tanggalLahir');
            $table->string('phone');
            $table->string('nip');
            $table->string('email');
            $table->string('alamat');
            $table->string('photo');
            $table->unsignedBigInteger('user_id')->nullable(); // Kolom untuk foreign key
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
