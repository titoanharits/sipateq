<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produksi;
use App\DetailProduksi;
use App\Packing;
use App\StokProduk;

class PackingController extends Controller
{

  public function readpacking(){
    $data = Packing::with('produksi','produk')->get();

$rstock = StokProduk::with('packing')->get();
    return view('packProses',compact('data','rstock'));
  }

  public function verifpacking($id){
    $packing = Packing::with('produksi.produk')->find($id);
    $packing->status = 1;
    $packing->save();

    $jmlproduksi = $packing->produksi->jumlah_produksi;
    if ($packing->produksi->id_produk == 1) {
      $stock = StokProduk::create([
        'packing_id' => $id,
        'ukuran_kemasan' => 10,
        'stok_pakan' => $jmlproduksi/10,
      ]);
    }else {
      $stock = StokProduk::create([
        'packing_id' => $id,
        'ukuran_kemasan' => 5,
        'stok_pakan' => $jmlproduksi/5,
      ]);
    }

    return redirect()->back();

  }
  // 
  // public function readstock(){
  //
  //   return view('packProses',compact('rstock'));
  // }


}
