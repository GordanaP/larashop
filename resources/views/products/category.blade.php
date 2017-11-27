@extends('layouts.app')

@section('sidebar')
    <div class="list-group sidebar">
        @foreach ($subcategories as $subcategory)
            <li class="list-group-item">
                <a href="{{ route('products.index', ['subcategory' => $subcategory->slug]) }}">
                    {{ $subcategory->name }}
                </a>
            </li>
        @endforeach
    </div>
@endsection

@section('content')
    @foreach ($products->chunk(4) as $chunk)
        <div class="row">
            @each ('products.partials._product', $chunk, 'product')
        </div>
    @endforeach
@endsection