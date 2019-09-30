<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksiTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('produksi', function (Blueprint $table) {
      $table->bigIncrements('id_produksi');
      $table->unsignedBigInteger('bahan_id');
      $table->foreign('bahan_id')->references('id_bahan')->on('bahan_baku');
      $table->integer('jumlah_bahan');
      $table->string('nama_produk');
      $table->integer('stok_produksi');
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
    Schema::dropIfExists('produksi');
  }
}
