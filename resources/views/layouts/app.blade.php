@extends('layouts.master')

@section('app_content')


    <div class="container">

        @yield('breadcrumbs')

        <div class="col-md-3">
            @yield('sidebar')
        </div>

        <div class="col-md-9">
            <router-view></router-view>
            @yield('content')
        </div>

    </div>

@endsection