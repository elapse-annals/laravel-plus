@extends('language._layout')

@section('content')
    <div class="detail">
        <el-form ref="form" :model="form" label-width="80px">
            @include('language._detail')
            <div class="operation">
                <el-button type="primary" @click="onSubmit">修改</el-button>
                <el-button @click="onCancel">取消</el-button>
                <a href="/languages">
                    <el-button>返回</el-button>
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
                'disabled_array': ['id'],
                'form': {},
                'fullscreen_loading': false,
                'is_disabled_edit': false,
                'init_list_data': {}
            },
            created() {
                let _this = this;
                this.init_list_data = _this.list_data;
            },
            mounted() {
                $('#id').attr('disabled', 'disabled');
                $("#id").parent().addClass('is-disabled');
            },
            methods: {
                onSubmit() {
                    axios.put('/languages/' + this.detail_data.id, this.detail_data).then((response) => {
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
                    }).catch(error => console.log(error));
                },
                onCancel() {
                    //
                    this.detail_data = this.init_list_data
                },
            }
        }
    </script>
    @parent
@endsection
