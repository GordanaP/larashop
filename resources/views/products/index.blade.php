@extends('layouts.app')

@section('title', '| Products')

@section('content')

    @foreach ($products->chunk(4) as $chunk)
        <div class="row">
            @each ('products.partials._product', $chunk, 'product')
        </div>
    @endforeach

@endsection