@extends('tmpls._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="detail_data" label-width="80px">

            @include('tmpls._detail')

            <div class="operation">
                <a href="/tmpls">
                    <el-button >返回</el-button>
                </a>
            </div>
        </el-form>
    </div>

@endsection

@section('script')
    <script>
        let js_data = JSON.parse('@json($js_data)');
        var mixin = {
            data: {
                'detail_data': js_data.detail_data,
                'fullscreen_loading': false,
                'is_disabled_edit': true,
            },
            methods: {
                onSubmit() {
                    console.log('submit!');
                },
            }
        }
    </script>
    @parent
@endsection
