<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeternakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peternak', function (Blueprint $table) {
            $table->increments('id');
            $table->String('alamat');
            $table->String('provinsi');
            $table->String('kabupaten');
            $table->String('kecamatan');
            $table->String('kelurahan');
            $table->string('foto_kandang')->nullable();
            $table->String('foto_ktp')->nullable();
            $table->String('foto_profil')->nullable();
            $table->enum('jenis_kelamin', [
              'Laki-Laki', 'Perempuan'
            ]);
            $table->String('no_ktp');
            $table->String('no_telp');
            $table->dateTime('tgl_lahir')->nullable();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('peternaks');
    }
}
