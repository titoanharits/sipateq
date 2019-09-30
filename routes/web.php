<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('index');
  // return view('welcome');
});

Auth::routes();
Route::get('/home', function(){
  if($user = \Auth::user()){
    if($user->level == 'admin'){
      return redirect('/adminHome');
    } else if($user->level == 'produksi'){
      return redirect('/homePengolahan');
    } else {
      return redirect('/homePacking');
    }
  } else {
    return redirect('/');;
  }
});

// route sementara halaman produksi
Route::group(['middleware' => ['auth', 'role:produksi']], function(){
  Route::get('/homePengolahan', function () {
    return view('olahHome');
  });
  Route::get('/cekProduksi', 'ProduksiController@cekProduksi')->name('cekProduksi');
  Route::post('/tambahJadwal', 'ProduksiController@tambahJadwal')->name('tambahJadwal');
  Route::get('/prosesProduksi', 'ProduksiController@prosesProduksi');
  Route::get('/prosesProduksi/{id}', 'ProduksiController@verifproduksi');
});

Route::group(['middleware' => ['auth', 'role:packing']], function(){
  // route sementara halaman Packing
  Route::get('/homePacking', function () {
    return view('packHome');
  });

  Route::get('/prosesPacking', 'PackingController@readpacking')->name('prosesPacking');
    // Route::get('/prosesPacking', 'PackingController@readstock')->name('prosesPacking');
  Route::get('/prosesPacking/{id}', 'PackingController@verifpacking')->name('prosesPacking');



});

Route::group(['middleware' => ['auth', 'role:admin']], function(){

  Route::get('/adminHome', 'HomeController@index')->name('home');
  Route::get('/pegawaiproduksi', 'AdminController@pegawaiproduksi')->name('adminPegawaiProduksi');
  Route::get('/pegawaipacking', 'AdminController@pegawaipacking')->name('adminPegawaiPacking');
  Route::get('/adminBahanMentah', 'AdminController@bahanmentah')->name('adminBahanMentah');
  Route::get('/adminPrediksi', 'HomeController@prediksi')->name('adminPrediksi');
  Route::get('/adminProduksiJual', 'AdminController@jual')->name('adminProduksiJual');
  Route::get('/adminProduksiGagal', 'HomeController@produksigagal')->name('adminProduksiGagal');
  Route::get('/adminStockProduksi', 'AdminController@produksijalan')->name('adminStockProduksi');


  Route::post('/tambahPegawaiProduksi', 'AdminController@tambahPegawaiProduksi')->name('tambahPegawaiProduksi');
  Route::post('/tambahPegawaiPacking', 'AdminController@tambahPegawaiPacking')->name('tambahPegawaiPacking');
  Route::post('/tambahBahanBaku', 'AdminController@tambahBahanBaku')->name('tambahBahanBaku');

});
