@extends('layouts.olah-dashboard')
@section('title')
Cek Produksi
@endsection

@section('content')

<div class="col-md-12">

  <div class="col-md-4">
    <div class="custom-box">
      <div class="servicetitle">
        <h4>Bahan Mentah Padi Tersedia</h4>
        <hr>
      </div>
      <div class="icn-main-container">
        <span class="icn-container">{{ $jumlah_padi }}kg</span>
      </div>
      <hr>
      <div class="icn-main-container">
        <span class="icn-container">{{ $jumlah_jagung }}kg</span>
      </div>
      <div class="servicetitle">
        <hr>
        <h4>Bahan Mentah Jagung Tersedia</h4>
      </div>
    </div>
    <!-- end custombox -->
  </div>
  <div class="mt">

    <div class="col-md-4">
      <!-- <div class="custom-box"> -->
      <div class="centered servicetitle">
        <h4>Jadwal Produksi</h4>
        <hr>

      </div>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Barang</th>
              <th class="numeric">Tanggal Mulai</th>
              <th class="numeric">Tanggal Selesai</th>
              <th class="numeric">Stock (kg)</th>

            </tr>
          </thead>
          <tbody>
            @foreach($produksis as $no => $produksi)
            @if($produksi->status == 0)
            <tr>
              <td>{{ $no+1 }}</td>
              <td>{{ $produksi->produk->nama_produk }}</td>
              <td class="numeric">{{ $produksi->tgl_mulai }}</td>
              <td class="numeric">{{ $produksi->tgl_selesai }}</td>
              <td class="numeric">{{ $produksi->jumlah_produksi }}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </section>


      <!-- </div> -->
      <!-- <div class="showback"> -->

      <!-- Button trigger modal -->
      <button class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus-circle"> Jadwal Produksi</i>
      </button>


      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Jadwal Produksi</h4>
            </div>

            <!-- modal body -->
            <div class="modal-body">
              <div class="form-panel">
                <div class="form">
                  <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ route('tambahJadwal') }}">
                    @csrf
                    <div class="form-group ">
                      <label for="firstname" class="control-label col-lg-4">Jumlah Produksi (Kg)</label>
                      <div class="col-lg-8">
                        <input class=" form-control amount" id="num" name="jmlproduksi" type="number" min="0" max="10">
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="firstname" class="control-label col-lg-4">Nama Produk</label>
                    <div class="col-lg-8">
                    <select name="namaproduk" class="form-control">
                      @foreach(\App\Produk::get() as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                      @endforeach
                    </select>
                  </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!-- end modal body -->
          </div>
        </div>
      </div>
      <!-- end modal</div> -->
    </div>

    <div class="col-md-4 card" style="padding-top:20px;">
      <h3>Pakan Yang Bisa di Produksi</h3>
      <table class="table table-bordered table-striped table-condensed">
        <thead>
          <tr>
            <th>Nama Pakan</th>
            <th>Jumlah Produksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Pakan Sapi</td>
            <td>{{ $pakan }} Kg</td>
          </tr>

          <tr>
            <td>Pakan Ayam I</td>
            <td>{{ $jumlah_pakan_ayam }} Kg</td>
          </tr>

          <tr>
            <td>Pakan Ayam II</td>
            <td>{{ $jumlah_pakan_ayam1 }} Kg</td>
          </tr>
        </tbody>
      </table>

    </div>

  </div>
</div>

<script type="text/javascript">
// Get DOM reference
var input = document.getElementById("num");

// Add event listener
input.addEventListener("input", function(e){

// Clear any old status
this.setCustomValidity("");

// Check for invalid state(s)
if(this.validity.rangeOverflow){
  this.setCustomValidity("Jumlah yang di Produksi tidak bisa lebih dari 10Kg per hari");
} else if(this.validity.rangeUnderflow){
  this.setCustomValidity("Jumlah yang di Produksi tidak boleh 0");
}
});
</script>

@endsection
