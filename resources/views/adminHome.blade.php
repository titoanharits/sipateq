@extends('layouts.base-dashboard')

@section('content')

        <div class="col-lg-9 main-chart">

                <div class="border-head">
                  <h3>Dashboard</h3>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

        </div>

@endsection
