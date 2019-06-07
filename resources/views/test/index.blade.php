@extends('test._layout')

@section('content')
    @include('test._search')
    @include('test._table')
    @include('test._page')
@endsection

@section('script')
    <script>
        var js_data = @json($js_data);
        var mixin = {
            data: {
                'data': js_data.data,
                'page': js_data.page,
                'search': {},
            },
            methods: {
                handleSizeChange(val) {
                    console.log(`每页 ${val} 条`);
                },
                handleCurrentChange(val) {
                    console.log(`当前页: ${val}`);
                },
                onSubmit() {
                    console.log(this.search);
                },
                resetForm(formName) {
                    if (this.$refs[formName] !== undefined) {
                        this.$refs[formName].resetFields();
                    } else {
                        console.log(this)
                        this.search = {};
                    }
                },
            }
        }
    </script>
    @parent
@endsection