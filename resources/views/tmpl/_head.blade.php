<meta charset="utf-8">
<meta name="description" content="{{$info['description']}}">
<meta name="author" content="{{$info['author']}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{$info['title']}}</title>

<!-- load bootstrap from a cdn -->
<link rel="stylesheet" href="{{asset('css/app.css')}}">