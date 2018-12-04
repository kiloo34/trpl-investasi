<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontrakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori');
            $table->text('profilResiko')->nullable();
            $table->text('rencanaPengelolaan')->nullable();
            $table->text('struktur')->nullable();
            $table->text('term')->nullable();
            $table->String('roia')->nullable();
            $table->String('roib')->nullable();
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
        Schema::dropIfExists('kontrak');
    }
}
