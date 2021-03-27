@extends('tmpls._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="form" label-width="80px">

            @include('tmpls._detail')

            <div class="operation">
                <el-button type="primary" @click="onSubmit">立即创建</el-button>
                <el-button @click="onCancel">取消</el-button>
                <a href="/tmpls">
                    <el-button>返回</el-button>
                </a>
            </div>
        </el-form>
    </div>
@endsection

@section('script')
    <script>
        var mixin = {
            data: {
                'detail_data': {},
                'disabled_array': ['id'],
                'fullscreen_loading': false,
                'form': {},
                'is_disabled_edit': false,
            },
            methods: {
                onSubmit() {
                    axios.post('/tmpls', this.detail_data)
                        .then((response) => {
                            var message_type = 'error';
                            if (200 == response.data.code) {
                                var message_type = 'success';
                            } else {
                                console.log(response);
                            }
                            this.$message({
                                message: response.data.msg,
                                type: message_type
                            });
                        })
                        .catch(error => console.log(error));
                },
                onCancel() {
                    history.go(0);
                },
            }
        }
    </script>
    @parent
@endsection
