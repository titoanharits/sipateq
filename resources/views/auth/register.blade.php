@extends('layouts.base')

@section('title')
Daftar Dulu
@endsection

@section('content')


<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">

        <form class="form-login" method="POST" action="{{ route('register') }}">
            @csrf

<h2 class="form-login-heading">Daftar Akun Peternak</h2>
            <div class="login-wrap">
            <div class="form-group">
                <label for="name" class="text-md-right">{{ __('Name') }}</label>

                <div class="">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- nama -->

            <div class="form-group">
                <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- email -->

            <div class="form-group">
                <label for="password" class="">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- password -->

            <div class="form-group">
                <label for="password-confirm" class="text-md-right">{{ __('Confirm Password') }}</label>

                <div class="">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <!-- password_confirmation -->

            <div class="form-group">
                <div class="pull-right">
                    <button type="submit" class="btn btn-theme">
                        {{ __('Register') }}
                    </button>
                </div>
            </div> <br><br><br>
            <!-- tombol Register -->


          <!-- <button  class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i>
            {{ __('MASOK') }}
          </button>

          <hr>

          <div class="registration">
            Gak punya akun? Daftar dibawah<br><br>
            <a role="button" class="btn btn-success"  href="/register" ><i class="fa fa-users"></i> Breeder</a>
          </div> -->

        </div>
        </form>

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
