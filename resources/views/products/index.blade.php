@extends('layouts.app')

@section('title', '| Products')

@section('sidebar')
    <div class="list-group sidebar">
        <!-- $value = slug, $name = $name -->
        @foreach ($category->subcategories->pluck('name', 'slug')->toArray() as $value => $name)
            <a href="{{ route('products.index', [$category, 'subcategory' => $value]) }}" class="list-group-item">
                {{ $name }}
            </a>
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