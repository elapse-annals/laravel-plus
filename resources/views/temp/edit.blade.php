@extends('temp._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="form" label-width="80px">
            @include('temp._detail')
            <div class="operation">
                <el-button type="primary" @click="onSubmit">修改</el-button>
                <el-button @click="onCancel">取消</el-button>
                <a href="/temps">
                    <el-button>返回</el-button>
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
                'is_disabled_edit': false,
                'form': {}
            },
            methods: {
                onSubmit() {
                    // @todo 处理提交
                    axios.put('/api/temps/2', this.detail_data).then((response) => {
                        console.log(response)
                        this.$message({
                            message: 'success',
                            type: 'success'
                        });
                    }).catch(error => console.log(error));
                },
                onCancel() {
                    // @todo 处理引用传递问题
                    history.go(0);
                }
            }
        }
    </script>
    @parent
@endsection