<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("kota_lahir");
            $table->string("agama");
            $table->string("gol_darah");
            $table->string("no_telp");
            $table->bigInteger("nik");
            $table->string("tgl_lahir");
            $table->integer("jenis_kelamin");
            $table->string("email");
            $table->bigInteger("kelas_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
