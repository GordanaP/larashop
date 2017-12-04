@extends('layouts.app')

@section('title', '| Products')

@section('breadcrumbs')
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active text-uppercase">{{ $category->name }}</li>
            </ol>
        </div>
@endsection
