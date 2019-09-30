@extends('layouts.base-dashboard')
@section('title')
Produk Siap Jual
@endsection


@section('content')
<!-- tabel cok -->
<div class="mt">
  <div class="col-lg-12">
    <div class="content-panel">
      <h4>Data Product Bisa Dijual</h4>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th class="numeric">Tanggal Jadi</th>
              <th class="numeric">Tanggal Exp</th>
              <th class="numeric">Ukuran Kemasan (kg)</th>
              <th class="numeric">Stock (pack)</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($rstock as $r)
            <tr>
              <td>{{$r->id}}</td>
              <td>{{$r->packing->produksi->produk->nama_produk}}</td>
              <td class="numeric">{{$r->packing->tgl_produksi}}</td>
              <td class="numeric">{{$r->packing->tgl_expired}}</td>
              <td class="numeric">{{$r->ukuran_kemasan}}</td>
              <td class="numeric">{{$r->stok_pakan}}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </section>
    </div>
  </div>
  @endsection
