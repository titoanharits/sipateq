@extends('layouts.base-dashboard')
@section('title')
Pegawai Packing
@endsection

@section('content')


<div class="row mt">
  <div class="col-lg-12">
    <div class="content-panel">
      <button type="button" style="margin-right:10px;"class="btn btn-round btn-theme pull-right" data-toggle="modal" data-target="#myModal">tambah pegawai</button> <br><br>
      <h4>Data Pegawai Packing</h4>
      <section id="unseen">
        <table class="table table-bordered table-striped table-condensed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Pegawai</th>
              <th class="numeric">Domisili</th>
              <th class="numeric">Jenis Kelamin</th>
              <th class="numeric">Email</th>
              <th class="numeric">Nomor HP</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($data as $d)
            <tr>
              <td>{{ $d->user->id }}</td>
              <td>{{ $d->nama }}</td>
              <td>{{ $d->domisili }}</td>
              <td>{{ $d->jenis_kelamin }}</td>
              <td>{{ $d->user->email }}</td>
              <td>{{ $d->no_hp }}</td>
            
            </tr>
            @endforeach
          </tbody>
        </table>
      </section>
    </div>
    <!-- /content-panel -->
  </div>
  <!-- /col-lg-4 -->
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Register Pegawai Packing</h4>
      </div>

      <!-- modal body -->
      <div class="modal-body">

        <div class="form-panel">
          <div class="form">
            <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ route('tambahPegawaiPacking') }}">
              @csrf
              <div class="form-group ">
                <label for="firstname" class="control-label col-lg-2">Nama Pegawai</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="firstname" name="nama" type="text">
                </div>
              </div>

              <div class="form-group ">
                <label for="lastname" class="control-label col-lg-2">Domisili</label>
                <div class="col-lg-10">
                  <input class=" form-control" id="lastname" name="domisili" type="text">
                </div>
              </div>

              <div class="form-group ">
                <label for="username" class="control-label col-lg-2">Jenis Kelamin</label>
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="laki-laki" checked="">
                      Laki-Laki
                    </label>

                    <label>
                      <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="perempuan">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group ">
                <label for="email" class="control-label col-lg-2">Email</label>
                <div class="col-lg-10">
                  <input class="form-control " id="email" name="email" type="email">
                </div>
              </div>

              <div class="form-group ">
                <label for="password" class="control-label col-lg-2">Password</label>
                <div class="col-lg-10">
                  <input class="form-control " id="password" name="password" type="password">
                </div>
              </div>
              <div class="form-group ">
                <label for="confirm_password" class="control-label col-lg-2">Ulangi Password</label>
                <div class="col-lg-10">
                  <input class="form-control " id="confirm_password" name="confirm_password" type="password">
                </div>
              </div>

              <div class="form-group ">
                <label for="email" class="control-label col-lg-2">Nomor HP</label>
                <div class="col-lg-10">
                  <input class="form-control " id="" name="no_hp" type="no_hp">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3">Foto KTP</label>
                <div class="controls col-md-9">
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <span class="btn btn-theme02 btn-file">
                      <span class="fileupload-new"><i class="fa fa-paperclip"></i> Select file</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                      <input type="file" class="default" />
                    </span>
                    <span class="fileupload-preview" style="margin-left:5px;"></span>
                    <a href="advanced_form_components.html#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /form-panel -->
      </div>
      <!-- end modal body -->

    </div>
  </div>
</div>
<!-- end modal</div> -->

@endsection
