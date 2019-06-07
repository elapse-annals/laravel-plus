@extends('temp._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="form" label-width="80px">
            @include('temp._detail')
            <div class="operation">
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
                <el-button @click="onCancel">取消</el-button>
            </div>
        </el-form>
    </div>

@endsection

@section('script')
    <script>
        var mixin = {
            data: {
                'detail_data': {},
                'is_edit': true,
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