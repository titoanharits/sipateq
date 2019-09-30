<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pegawai;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('adminHome');
    }



    public function prediksi()
    {
      return view('adminPrediksi');
    }

    public function produksijual()
    {
      return view('adminProduksiJual');
    }

    public function produksigagal()
    {
      return view('adminProduksiGagal');
    }

    public function stockproduksi()
    {
      return view('adminStockProduksi');
    }

}
