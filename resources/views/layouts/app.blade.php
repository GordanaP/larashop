@extends('layouts.master')

@section('app_content')


    <div class="container">

        @yield('breadcrumbs')

        <router-view></router-view>

        @yield('content')

    </div>

@endsection