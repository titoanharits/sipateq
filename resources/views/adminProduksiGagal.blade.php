@extends('layouts.base-dashboard')
@section('title')
Produk Gagal
@endsection


@section('content')
<!-- tabel cok -->
<div class="mt">
  <div class="col-lg-12">
    <div class="content-panel">
      <h4>Data Produksi Gagal</h4>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th class="numeric">Stock (kg)</th>
              <th class="numeric">Keterangan Gagal</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>01</td>
              <td>Supplemen Super</td>
              <td class="numeric">30</td>
              <td class="">Terlalu lama disimpan</td>

            </tr>

            <tr>
              <td>02</td>
              <td>Pakan Ternak</td>
              <td class="numeric">25</td>
              <td class="numeric">Bahan baku tidak bisa diolah</td>

            </tr>



          </tbody>
        </table>
      </section>
    </div>
@endsection
