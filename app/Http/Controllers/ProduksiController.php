<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BahanBaku;
use App\Produk;
use App\Produksi;
use App\DetailProduksi;
use App\Packing;
use Carbon\Carbon;

class ProduksiController extends Controller
{
  public function cekProduksi(){
    $jagungs = BahanBaku::select('stok')->where('jenisBahan_id', 1)->get();
    $padis = BahanBaku::select('stok')->where('jenisBahan_id', 2)->get();
    $produksis = DetailProduksi::with('bahanBaku')->get();
    $jumlah_jagung = 0;
    $jumlah_padi = 0;
    foreach($jagungs as $jagung){
      $jumlah_jagung += $jagung->stok;
    }

    foreach ($padis as $padi) {
      $jumlah_padi += $padi->stok;
    }

    foreach ($produksis as $produksi) {
      if($produksi->bahanBaku->nama_bahan == 'Jagung'){
                                                                                                                                                                                                                                                                                                                                                          $jumla'`h`'_jagung -= $produksi->jumlah_bahan;
      } else {
        $jumlah_padi -= $produksi->jumlah_bahan;
      }
    }

    $min_padi = $jumlah_padi / 6;
    $min_jagung = $jumlah_jagung / 4;
    $jumlah_pakan_ternak = min($min_padi, $min_jagung);
    $pakan = floor(min($min_padi, $min_jagung) * 10);
    $sisa_padi = ($min_padi - $jumlah_pakan_ternak)*6;
    $sisa_jagung = ($min_jagung - $jumlah_pakan_ternak)*4;

    //pakan ayam serat
    $min_padi1 =  10;
    $jumlah_pakan_ayam =  floor(($jumlah_padi / $min_padi1)*10);
    $sisa_padi1 =  $jumlah_padi % $min_padi1;

    //pakan ayam super
    $min_jagung1   =  10;
    $jumlah_pakan_ayam1 =floor(($jumlah_jagung / $min_jagung1)*10);
    $sisa_jagung1 =  $jumlah_jagung % $min_jagung1;

    $produksis = Produksi::with('produk')->get();
    // return $produksis;
    return view('olahCekProduksi', compact('jumlah_jagung', 'jumlah_padi', 'jumlah_pakan_ternak',
    'sisa_padi', 'sisa_jagung', 'pakan', 'jumlah_pakan_ayam', 'jumlah_pakan_ayam1', 'sisa_jagung1', 'sisa_padi1', 'produksis'));
  }

  public function prosesProduksi(){
    $produksis = Produksi::with('produk')->get();


    return view('olahProsesProduksi',compact('produksis'));
  }

  public function verifproduksi($id){


    $packing = Packing::create([
      'id_produksi' => $id,
      'tgl_expired' => Carbon::now()->addDays(360),
      'tgl_produksi' => Carbon::now(),
      'status'=>0,
    ]);

    $produksiupd = Produksi::find($id);
    $produksiupd->status = 1;
    $produksiupd->save();

    return redirect('prosesProduksi');
  }

  public function tambahJadwal(Request $request){
    // $produksis = Produksi::where('created_at', '>',  Carbon::today())->where('created_at', '<', Carbon::today()->addDays(1))->get();
    // $total =0;
    // foreach($produksis as $produksi){
    //   $total += $produksi->jumlah_produksi;
    // }
    //
    // if($total <= 10){
      $request->validate([
        'jmlproduksi'     => 'required|numeric',
        // 'pemasok'        => 'required|string',
        // 'stok'           => 'required|numeric',
      ]);

      if($request->namaproduk == 1){
        $produksi = Produksi::create([
          'id_produk' => $request->namaproduk,
          'tgl_mulai' => Carbon::now()->addHours(7),
          'tgl_selesai' => Carbon::now()->addHours(9)->addMinutes(15),
          'jumlah_produksi' => $request->jmlproduksi,
          'status' => 0
        ]);

        DetailProduksi::create([
          'id_bahan' => 1,
          'id_produksi' => $produksi->id,
          'jumlah_bahan' => floor(4/10 * $request->jmlproduksi)
        ]);

        DetailProduksi::create([
          'id_bahan' => 2,
          'id_produksi' => $produksi->id,
          'jumlah_bahan' => floor(6/10 * $request->jmlproduksi)
        ]);

      } else if($request->namaproduk == 2){
        $produksi = Produksi::create([
          'id_produk' => $request->namaproduk,
          'tgl_mulai' => Carbon::now()->addHours(7),
          'tgl_selesai' => Carbon::now()->addHours(8)->addMinutes(45),
          'jumlah_produksi' => $request->jmlproduksi,
          'status' => 0
        ]);

        DetailProduksi::create([
          'id_bahan' => 2,
          'id_produksi' => $produksi->id,
          'jumlah_bahan' => floor(10 / 10 * $request->jmlproduksi)
        ]);
      } else {
        $produksi = Produksi::create([
          'id_produk' => $request->namaproduk,
          'tgl_mulai' => Carbon::now()->addHours(7),
          'tgl_selesai' => Carbon::now()->addHours(10),
          'jumlah_produksi' => $request->jmlproduksi,
          'status' => 0

        ]);

        DetailProduksi::create([
          'id_bahan' => 1,
          'id_produksi' => $produksi->id,
          'jumlah_bahan' => floor(10 / 10 * $request->jmlproduksi)
        ]);
      }

      return redirect()->route('cekProduksi');
    }

    // }

}
