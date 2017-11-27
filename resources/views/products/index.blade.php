@extends('layouts.app')

@section('title', '| Products')

@section('breadcrumbs')
    <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li class="active text-uppercase">{{ $category->name }}</li>
        </ol>
    </div>
@endsection

@section('sidebar')
    <div class="list-group sidebar">
        <a class="list-group-item text-uppercase"><b>Type</b></a>
        @foreach ($category->subcategories as $subcategory)
            <a href="{{ route('products.index', array_merge([$category, 'subcategory' => $subcategory->slug], Request::query())) }}" class="list-group-item">
                {{ ucwords($subcategory->name) }}
            </a>
        @endforeach
    </div>

    <div class="list-group sidebar">
        <a class="list-group-item text-uppercase"><b>Brand</b></a>
        @foreach ($brands as $brand)
            <a href="{{ route('products.index', array_merge([$category, 'brand' => $brand->slug], Request::query())) }}" class="list-group-item">
                {{ ucwords($brand->name) }}
            </a>
        @endforeach
    </div>
@endsection

@section('content')

    <div class="result-count" style="border-bottom: 1px solid #eee; margin-bottom:20px">
        <p style="font-size: 17px;">{{ $products->count() }} Product results</p>
    </div>

    <!-- Products -->
    @foreach ($products->chunk(4) as $chunk)
        <div class="row">
            @each ('products.partials._product', $chunk, 'product')
        </div>
    @endforeach

    <!-- Pagination -->
    <div class="text-center">
        {{ $products->appends(Request::query())->links() }}
    </div>
@endsection