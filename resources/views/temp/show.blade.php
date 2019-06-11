@extends('temp._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="form" label-width="80px">
            @include('temp._detail')
            <div class="operation">
                <a href="/temps">
                    <el-button @click="onReturn">返回</el-button>
                </a>
            </div>
        </el-form>
    </div>

@endsection

@section('script')
    <script>
        var js_data = @json($js_data);
        var mixin = {
            data: {
                'detail_data': js_data.detail_data,
                'is_disabled_edit': true,
            },
            methods: {
                onSubmit() {
                    console.log('submit!');
                }
            }
        }
    </script>
    @parent
@endsection