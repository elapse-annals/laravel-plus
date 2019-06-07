<!doctype html>
<html>
<head>
    @include('temp.head')
</head>
<body>
<div id="app" class="container">
    <header class="row">
        @include('temp.header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row">
        @include('temp.footer')
    </footer>
</div>
@section('script')
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@show
</body>
</html>