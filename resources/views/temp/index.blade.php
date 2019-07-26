@extends('temp._layout')

@section('content')
    <div class="search">
        @include('temp._search')
    </div>
    <div class="stripe">
        @include('temp._stripe')
    </div>
    <div class="table">
        @include('temp._list')
    </div>
    <div class="page">
        @include('temp._page')
    </div>
@endsection

@section('script')
    <script>
        var js_data =@json($js_data);
        var mixin = {
            data: {
                'table_data': js_data.data,
                'page': js_data.page,
                'search': {},
                fullscreenLoading: false
            },
            methods: {
                handleSelectionChange() {
                },
                handleSizeChange(per_page) {
                    this.page.per_page = per_page;
                    this.reload();
                },
                handleCurrentChange(current_page) {
                    this.page.current_page = current_page;
                    this.reload();
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
                alertThis(temp_this) {
                    console.log(temp_this)
                },
                deleteRow(id) {
                    axios.delete('/temps/' + id)
                      .then(
                        (response) => {
                            this.$message({
                                message: 'success',
                                type: 'success'
                            });
                            this.reload();
                        }
                      )
                      .catch(error => console.log(error));
                },
                reload() {
                    let _this = this;
                    let request_parameter = {
                        search: _this.search,
                        current_page: _this.page.current_page,
                        per_page: _this.page.per_page,
                        api: true
                    };
                    axios.get('/temps/', {params: request_parameter})
                      .then((response) => {
                          var message_type = 'reload error';
                          let response_parameter = response.data;
                          if (200 == response_parameter.code) {
                              _this.table_data = response_parameter.data
                          } else {
                              this.$message({
                                  message: response_parameter.msg,
                                  type: message_type
                              });
                          }
                      })
                      .catch(error => console.log(error));
                }
            }
        }
    </script>
    @parent
@endsection