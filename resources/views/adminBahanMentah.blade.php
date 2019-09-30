@extends('layouts.base-dashboard')
@section('title')
Pegawai Produksi
@endsection


@section('content')


<!-- inputan cok -->
<div class="showback">
  <div class="container">
    <h4>Tambah Bahan Mentah</h4>
    <form method="post" action="{{ route('tambahBahanBaku') }}">
      @csrf
      <div class="form-group">
        <div class="row" style="margin: 5px">
          <div class="col-md-12">

            <div class="form-inline">
              <div class="radio">
                <label>
                  <input type="radio" name="jenisBahan_id" id="optionsRadios1" value="1" checked="">
                  Jagung
                </label>
              </div> &nbsp&nbsp&nbsp
              <div class="radio">
                <label>
                  <input type="radio" name="jenisBahan_id" id="optionsRadios1" value="2" checked="">
                  Padi
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group ">
            <div class="col-md-3" style="margin:5px">

              <input class=" form-control" id="firstname" name="pemasok" placeholder="Nama Pemasok" type="text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3" style="margin:5px">
            <div class="input-group">
              <input placeholder="jumlah bahan mentah" type="text" class="form-control" name="stok" size="16">
              <span class="input-group-addon">Kg</span>
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-round btn-theme">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- tabel cok -->
<div class="mt">
  <div class="col-lg-12">
    <div class="content-panel">
      <h4>Data Bahan Mentah</h4>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pemasok</th>
              <th>Jenis Bahan</th>
              <th class="numeric">Kuantitas (kg)</th>
              <th class="numeric">action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bahan as $b)
            <tr>
              <td>{{ $b->id }}</td>
              <td>{{ $b->Pemasok }}</td>

              <td>  <?php  $jenis = $b->jenisbahan_id;
                       if ($jenis == 1){
                        echo "Jagung";
                      }
                      else {
                        echo "Padi";
                      };?></td>
              <td>{{ $b->stok }}</td>
              <td>{{ $b->action}}</td>

            </tr>
            @endforeach

          </tbody>
        </table>
      </section>
    </div>
    <!-- /content-panel -->
  </div>
</div>



<div class="mt">
  <div class="col-md-12">
    <div class="grey-panel pn donut-chart">
      <div class="grey-header">
        <h5>STATISTIK BAHAN MENTAH</h5>
      </div>
      <canvas class="pull-left" id="serverstatus01" height="180" width="180" style="margin-left:20%; width: 120px; height: 120px;"></canvas>
      <script>
      var doughnutData = [{
        value: 93,
        color: "#FF6B6B"
      },
      {
        value: 7,
        color: "#000000"
      }
    ];
    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
    </script>
    <div class="row">
      <div class="col-sm-3">
        <p>Jumlah Jagung</p> <br>
        <p>Jumlah Padi</p>

      </div>
      <div class="col-sm-3">
        <h2>600</h2>

        <h2 style="color:black;">50</h2>
      </div>
    </div>
  </div>
  <!-- /grey-panel -->
</div>
</div>


@endsection
