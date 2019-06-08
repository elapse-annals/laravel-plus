@extends('test._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="form" label-width="80px">
            @include('test._detail')
            <div class="operation">
                <el-button type="primary" @click="onSubmit">修改</el-button>
                <el-button @click="onCancel">取消</el-button>
                <el-button @click="onReturn">返回</el-button>
            </div>
        </el-form>
    </div>

@endsection

@section('script')
    <script>
        var mixin = {
            data: {
                'detail_data': {},
                'is_disabled': false,
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