@extends('layouts.pack-dashboard')
@section('title')
Proses Packing
@endsection

@section('content')
<div class=" mt col-md-4">

    <h3><i class="fa fa-list-alt"></i> Bahan Mentah Padi Tersedia</h3>

</div>

<div class="col-md-12">

  <div class="mt col-md-6">
    <div class="content-panel">
      <h4>Pakan Siap Packing</h4>

      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th class="numeric">Tanggal Selesai</th>
              <th class="numeric">Tanggal Expired</th>
              <th class="numeric">Stock (kg)</th>
              <th class="">Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
              <td>{{$d->id}}</td>
              <td>{{$d->produksi->produk->nama_produk}}</td>
              <td class="numeric">{{$d->tgl_produksi}}</td>
              <td class="numeric">{{$d->tgl_expired}}</td>
              <td class="numeric">{{$d->produksi->jumlah_produksi}}</td>
              <td>
                @if($d->status==0)
                <div class="centered hidden-phone">
                  <a href="/prosesPacking/{{$d->id}}">
                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                </a>
                </div>
                @else
                <center><b>verified</b>
                @endif


              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </section>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">Verifikasi Produk Terpacking</h4>
        </div>



          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Verif</button>
          </div>
        </div>
      </div>
    </div>


    <div class="mt col-md-6">
      <div class="content-panel">
        <h4>Pakan Siap Jual</h4>
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
