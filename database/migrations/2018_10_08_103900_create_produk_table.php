<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id');
            $table->String('foto_produk');
            $table->String('nama_produk');
            $table->integer('harga');
            $table->String('periode');
            $table->integer('stock');
            $table->text('deskripsi');
            $table->integer('id_peternak')->unsigned();
            $table->foreign('id_peternak')->on('peternak')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_kontrak')->unsigned();
            $table->foreign('id_kontrak')->references('id')->on('kontrak')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('produk');
    }
}
