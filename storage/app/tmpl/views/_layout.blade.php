<!doctype html>
<html>
<head>
    @include('temp._head')
</head>
<body>
<div id="app" class="container">
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