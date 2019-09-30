@extends('layouts.olah-dashboard')
@section('title')
Pengolahan Home
@endsection

@section('content')

<div class="mt col-md-12">
  <div class="content-panel">
    <h4>Produksi Berlangsung</h4>
    <div class="pull-right col-md-2">
      <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" placeholder="sort by date">
    </div>

    <section id="unseen">

      <table class=" mt table table-bordered table-striped table-condensed">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th class="numeric">Tanggal Mulai</th>
            <th class="numeric">Tanggal Selesai</th>
            <th class="numeric">Stock (kg)</th>
            <th class="">Action</th>

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
            <td>
              @if($produksi->status == 0)
              <div class="centered hidden-phone">
                <a href="/prosesProduksi/{{$produksi->id}}">
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
    <div class="row-fluid"><div class="span6"><div class="dataTables_info" id="hidden-table-info_info">Showing 1 to 10 of 57 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Verifikasi Produk Selesai</h4>
      </div>

      <!-- modal body -->
      <div class="modal-body">
        <div class="form-panel">
          <div class="form">

              <form class="cmxform form-horizontal style-form" id="signupForm" method="get" action="">
                <div class="form-group ">
                  <label for="firstname"  class="control-label col-lg-4">Hasil Jadi (kg)</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="disabledInput" name="produkjadi" type="number" disabled="" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Tanggal Expired</label>
                  <div class="col-md-8">
                    <div class="input-group input-large" data-date="01/01/2014" data-date-format="dd/mm/yyyy">
                      <input class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="">
                    </div>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="firstname" class="control-label col-lg-4">Keterangan</label>
                  <div class="col-lg-8">
                    <input class=" form-control" id="" name="produkjadi" type="text">
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- end modal body -->

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Verif</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal</div> -->

  @endsection
