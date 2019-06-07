<!doctype html>
<html>
<head>
    @include('test._head')
</head>
<body>
<div id="app" class="container">
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