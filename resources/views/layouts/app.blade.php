@extends('layouts.master')

@section('app_content')
    <div class="container">

        <div class="col-md-3">
            @if ($category)
                <div class="list-group sidebar">
                    @foreach($category->subcategories as $subcategory)
                    <a href="#" class="list-group-item" style="border:none!important; font-size: 15px; color: inherit">
                        {{ $subcategory->name_formatted }}
                    </a>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
@endsection