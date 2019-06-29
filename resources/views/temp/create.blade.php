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
                'form': {},
                'detail_data': {},
                'is_disabled_edit': false,
            },
            methods: {
                onSubmit() {
                    axios.post('/temps')
                      .then((response) => {
                          this.$message({
                              message: 'success',
                              type: 'success'
                          });
                      })
                      .catch(error => console.log(error));
                },
                onCancel() {

                }
            }
        }
    </script>
    @parent
@endsection