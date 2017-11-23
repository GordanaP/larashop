<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('partials.top._header')
    @yield('links')
</head>

<body>
    <div id="app">

        @include('partials.top._nav')

        <div class="container">
            <div class="col-md-3">
                Sidebar
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>

    </div>

    @include('partials.bottom._footer')
    @include('partials.bottom._scripts')
    @yield('scripts')
</body>

</html>
