<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('test._head')
</head>
<body>
<div id="app" class="container v-cloak">
    <header class="row">
        @include('test._header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row">
        @include('test._footer')
    </footer>
</div>
@section('script')
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@show
</body>
</html>