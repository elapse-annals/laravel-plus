@extends('test._layout')

@section('content')
    <div class="search">
        @include('test._search')
    </div>
    <div class="stripe">
        @include('test._stripe')
    </div>
    <div class="table">
        @include('test._table')
    </div>
    <div class="page">
        @include('test._page')
    </div>
@endsection

@section('script')
    <script>
        var js_data = @json($js_data);
        var mixin = {
            data: {
                'data': js_data.data,
                'table_data': js_data.data,
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