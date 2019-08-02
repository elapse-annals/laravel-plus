<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Plus</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>


</head>
<body>
<div id="app" class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <br/>
    <div class="content">
        <div class="title m-b-md">
            Laravel Plus
        </div>
        <div class="links">
            <a href="https://laravel.com/docs">Laravel Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">Laravel GitHub</a>
            <a href="https://github.com/ElapseAnnals/LaravelPlus">Laravel Plus GitHub</a>
        </div>
        <br>
        <div v-cloak>
            <div>
                <label for="show_components">集成 Vue/Element UI 组件展示：</label>
                <el-switch id="show_components"
                           v-model="show_components"
                           active-color="#13ce66"
                           inactive-color="#ff4949">
                </el-switch>
                <div v-show="show_components">
                    <example-component></example-component>
                    <el-button plain @click="open">@{{ alert_msg }}</el-button>
                </div>
            </div>
            <div>
                <el-link href="tmpls" type="primary" target="_blank">tmpls 测试地址</el-link>
            </div>
        </div>
    </div>
</div>
<script>
    var mixin = {
        data() {
            return {
                show_components: false,
                alert_msg: '打开消息提示'
            }
        },
        methods: {
            open() {
                this.$message('这是一条消息提示');
            },

            openVn() {
                const h = this.$createElement;
                this.$message({
                    message: h('p', null, [
                        h('span', null, '内容可以是 '),
                        h('i', {style: 'color: teal'}, 'VNode')
                    ])
                });
            }
        }
    }
</script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
