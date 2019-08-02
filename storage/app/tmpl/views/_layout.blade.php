<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('temp._head')
</head>
<body>
<div id="app" class="container v-cloak" v-loading.fullscreen.lock="fullscreen_loading">
    <header class="row">
        @include('temp._header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row">
        @include('temp._footer')
    </footer>
</div>
@section('script')
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@show
</body>
</html>