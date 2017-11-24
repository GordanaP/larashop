@extends('layouts.master')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('app_content')
    <div class="container">
        <img src="{{ asset('images/fashion.jpg') }}" alt="" class="image">
    </div>
@endsection
