@extends('layouts.master')

@section('app_content')
    <div class="container">

        <div class="col-md-3">
            @yield('sidebar')
        </div>

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
@endsection