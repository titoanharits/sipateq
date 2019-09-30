@extends('layouts.base')

@section('title')
Login ke SiKebun
@endsection


@section('loginregis')

  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <body>
        <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
        <div id="login-page">
          <div class="container">

            <form class="form-login" method="POST" action="{{ route('login') }}">
              @csrf
              <h2 class="form-login-heading">Login SiPATEK</h2>
              <div class="login-wrap">

                <div class="form-group">
                <input placeholder="E-mail" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{$errors->first('email')}}</strong>
                  </span>
                  @endif
              </div>

              <div class="form-group">
              <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" autofocus>
              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif

              @if (Route::has('password.request'))
                <span class="pull-right">
                  <a data-toggle="modal" class="btn btn-link" href=#myModal>
                      {{ __('Lupa Password?') }}
                  </a>
                </span>
              @endif
            </div>

              <br><br>

                <button  class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>
                  {{ __('MASOK') }}
                </button>

                <hr>

                <div class="registration">
                  Gak punya akun? Daftar dibawah<br><br>
                  <a role="button" class="btn btn-success"  href="/register" ><i class="fa fa-users"></i> Breeder</a>
                </div>

              </div>
              </form>




              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Lupa Password ?</h4>
                    </div>
                    <div class="modal-body">
                      <p>Masukin email mu yang passwordnya lupa</p>
                      <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                    </div>
                    <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                      <button class="btn btn-theme" type="button">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End modal -->
          </div> <!-- end container -->
        </div> <!-- end login-page -->

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="{{asset('dashio/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('dashio/lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--BACKSTRETCH-->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="text/javascript" src="{{asset('dashio/lib/jquery.backstretch.min.js')}}"></script>
        <script>
          $.backstretch("{{asset('dashio/img/login-bg.jpg')}}", {
            speed: 300
          });
        </script>
      </body>

@endsection



</html>
