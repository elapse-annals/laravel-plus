<meta charset="utf-8">
<meta name="description" content="{{$info['description']}}">
<meta name="author" content="{{$info['author']}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{$info['title']}}</title>

<!-- load bootstrap from a cdn -->
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<style>
    .search, .stripe, .page {
        width: 100%;
    }

    .el-row {
        margin-bottom: 20px;

    &
    :last-child {
        margin-bottom: 0;
    }

    }
    .el-col {
        border-radius: 4px;
    }

    .bg-purple-dark {
        background: #99a9bf;
    }

    .bg-purple {
        background: #d3dce6;
    }

    .bg-purple-light {
        background: #e5e9f2;
    }

    .grid-content {
        border-radius: 4px;
        min-height: 36px;
    }

    .row-bg {
        padding: 10px 0;
        background-color: #f9fafc;
    }
</style>