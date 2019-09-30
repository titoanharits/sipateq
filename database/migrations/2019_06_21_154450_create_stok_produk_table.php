<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_produk', function (Blueprint $table) {
            $table->bigIncrements('id_stok');
            $table->unsignedBigInteger('packing_id');
            $table->foreign('packing_id')->references('id_packing')->on('packing');
            $table->integer('ukuran_kemasan');
            $table->integer('stok_pakan');
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
        Schema::dropIfExists('stok_produk');
    }
}
