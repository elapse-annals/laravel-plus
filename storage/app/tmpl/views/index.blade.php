@extends('temp._layout')

@section('content')
    @parent
    <p>index page</p>
    @include('temp.page')
@endsection

@section('script')
    <script>
        var mixin = {
            data: {
                page: {
                    current_page: 1
                },
            },
            methods: {
                handleSizeChange(val) {
                    console.log(`每页 ${val} 条`);
                },
                handleCurrentChange(val) {
                    console.log(`当前页: ${val}`);
                }
            }
        }
    </script>
    @parent
@endsection