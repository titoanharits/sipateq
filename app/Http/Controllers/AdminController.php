<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Pegawai;
use App\BahanBaku;
use App\JenisBahan;
use App\Produksi;
use App\StokProduk;
class AdminController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  //fungsi CREATE Admin

  public function tambahBahanBaku(Request $request)
  {
    // dd($request->pemasok);
    $request->validate([
      'jenisBahan_id'     => 'required|numeric',
      'pemasok'        => 'required|string',
      'stok'           => 'required|numeric',
    ]);

    BahanBaku::create([

      'jenisbahan_id'     => $request->jenisBahan_id,
      'Pemasok'        => $request->pemasok,
      'stok'           => $request->stok,

    ]);

    return redirect()->route('adminBahanMentah');
  }

  public function tambahPegawaiProduksi(Request $request)
  {
    // dd($request->no_hp);
    $request->validate([
      'nama'            => 'required|string',
      'domisili'        => 'required|string',
      'jenis_kelamin'   => 'required|string',
      'email'           => 'required|string',
      'password'        => 'required|string',
      'no_hp'           => 'required|numeric',
    ]);
    $user = User::create([
      'email'     => $request->email,
      'password'  => Hash::make($request['password']),
      'level'     => 'produksi'
    ]);
    Pegawai::create([
      'nama'          => $request->nama,
      'domisili'      => $request->domisili,
      'jenis_kelamin' => $request->jenis_kelamin,
      'no_hp'         => $request->no_hp,
      'user_id'       => $user->id,
    ]);

    return redirect()->route('adminPegawaiProduksi');
  }



  public function tambahPegawaiPacking(Request $request)
  {

    $request->validate([
      'nama'            => 'required|string',
      'domisili'        => 'required|string',
      'jenis_kelamin'   => 'required|string',
      'email'           => 'required|string',
      'password'        => 'required|string',
      'no_hp'           => 'required|numeric',
    ]);
    $user = User::create([
      'email'     => $request->email,
      'password'  => Hash::make($request['password']),
      'level'     => 'packing'
    ]);
    Pegawai::create([
      'nama'          => $request->nama,
      'domisili'      => $request->domisili,
      'jenis_kelamin' => $request->jenis_kelamin,
      'no_hp'         => $request->no_hp,
      'user_id'       => $user->id,
    ]);

    return redirect()->route('adminPegawaiPacking');
  }

  public function pegawaiproduksi()
  {
    // $data = Pegawai::where('level', user()->level->'pegawai')->get();
    $data = Pegawai::with('user')
    ->whereHas('user', function($q){
      $q->where('level', 'produksi');
    })->get();

    return view('adminPegawaiProduksi', [
      'data'  => $data
    ]);
  }

  public function pegawaipacking()
  {
    $data = Pegawai::with('user')
    ->whereHas('user', function($q){
      $q->where('level', 'packing');
    })->get();
    return view('adminPegawaiPacking', [
      'data'  => $data
    ]);
  }

  public function bahanmentah()
  {
    $bahan = bahanBaku::all();
    return view('adminBahanMentah', [
      'bahan'  => $bahan
    ]);
  }

  public function jual(){
    $rstock = StokProduk::with('packing')->get();
    return view('adminProduksiJual',compact('rstock'));
  }

  public function produksijalan(){
    $produksis = Produksi::with('produk')->get();


    return view('adminStockProduksi',compact('produksis'));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }

  public function getDataPegawaiProduksi()
  {
    // code...
  }
}
