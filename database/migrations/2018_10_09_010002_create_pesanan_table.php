<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kuantitas');
            $table->double('total');
            $table->enum('status', [
                'Menunggu Pembayaran',
                'Proses verifikasi',
                'Berjalan',
                'Selesai'
            ]);
            $table->integer('id_investor')->unsigned();
            $table->foreign('id_investor')->on('investor')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_produk')->unsigned();
            $table->foreign('id_produk')->on('produk')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_pembayaran')->unsigned();
            $table->foreign('id_pembayaran')->on('pembayaran')->references('id')->onUpdated('cascade');
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
        Schema::dropIfExists('pesanan');
    }
}
