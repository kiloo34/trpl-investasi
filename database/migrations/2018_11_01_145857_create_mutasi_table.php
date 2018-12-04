<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nominal');
            $table->enum('Status', [
                'dalam pengajuan', 'diproses', 'selesai'
            ]);
            $table->integer('sAkhir');
            $table->integer('id_akun_bank')->unsigned()->nullable();
            $table->foreign('id_akun_bank')->references('id')->on('akun_bank')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_saldo')->unsigned();
            $table->foreign('id_saldo')->references('id')->on('saldo')->onUpdate('cascade');
            $table->integer('id_pembayaran')->unsigned()->nullable();
            $table->foreign('id_pembayaran')->on('pembayaran')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('mutasi');
    }
}
