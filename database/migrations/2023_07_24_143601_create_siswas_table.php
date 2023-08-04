<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenisKelamin');
            $table->string('tanggalLahir');
            $table->string('phone');
            $table->string('nis');
            $table->string('email');
            $table->string('alamat');
            $table->string('photo');
            $table->string('orangTua');
            $table->unsignedBigInteger('user_id')->nullable(); // Kolom untuk foreign key
            $table->unsignedBigInteger('kelas_id')->nullable(); // Kolom untuk foreign key
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
