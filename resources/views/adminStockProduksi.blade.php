@extends('layouts.base-dashboard')
@section('title')
Stock Produksi
@endsection


@section('content')
<!-- tabel cok -->
<div class="mt">
  <div class="col-lg-12">
    <div class="content-panel">
      <h4>Produksi Berjalan</h4>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th class="numeric">Tanggal Mulai</th>
              <th class="numeric">Tanggal Jadi</th>
              <th class="numeric">Stock (kg)</th>
              <th class="numeric">Status</th>
            </tr>
          </thead>
          <tbody>

            @foreach($produksis as $no => $produksi)
            <tr>

              <td>{{ $no+1 }}</td>
              <td>{{ $produksi->produk->nama_produk }}</td>
              <td class="numeric">{{ $produksi->tgl_mulai }}</td>
              <td class="numeric">{{ $produksi->tgl_selesai }}</td>
              <td class="numeric">{{ $produksi->jumlah_produksi }}</td>

              <td>@if($produksi->status == 0)
                Sedang Berjalan
                @else
                Selesai
                @endif
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </section>
    </div>
    @endsection
