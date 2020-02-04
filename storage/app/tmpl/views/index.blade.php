@extends('tmpls._layout')

@section('content')
    <div class="search">
        @include('tmpls._search')
    </div>
    <div class="stripe">
        @include('tmpls._stripe')
    </div>
    <div class="table">
        @include('tmpls._list')
    </div>
    <div class="page">
        @include('tmpls._page')
    </div>
@endsection

@section('script')
    <script>
        var js_data = JSON.parse('@json($js_data)');
        var mixin = {
            data: {
                'fullscreen_loading': false,
                'list_data': js_data.data,
                'page': js_data.page,
                'search': {},
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
                    this.reload();
                },
                resetForm(formName) {
                    if (this.$refs[formName] !== undefined) {
                        this.$refs[formName].resetFields();
                    } else {
                        this.search = {};
                    }
                    this.reload();
                },
                alertThis(tmpl_this) {
                    console.log(tmpl_this)
                },
                deleteRow(id) {
                    axios.delete('/tmpls/' + id)
                        .then(
                            (response) => {
                                console.log(response);
                                this.$message({
                                    message: 'delete success',
                                    type: 'success'
                                });
                                this.reload();
                            }
                        )
                        .catch(error => console.log(error));
                },
                reload() {
                    var _this = this;
                    _this.fullscreen_loading = true;
                    let request_parameter = {
                        search: _this.search,
                        page: _this.page.current_page,
                        per_page: _this.page.per_page,
                        api: true
                    };
                    axios.get('/tmpls/', {params: request_parameter})
                        .then((response) => {
                            _this.fullscreen_loading = false;
                            var message_type = 'reload error';
                            let response_parameter = response.data;
                            if (200 == response_parameter.code) {
                                _this.list_data = response_parameter.data.data;
                                _this.page = response_parameter.page;
                                let go_url = '#' + _this.getUrl(response.request.responseURL);
                                window.history.pushState({reload: 'reload'}, 'title', go_url);
                            } else {
                                _this.fullscreen_loading = false;
                                this.$message({
                                    message: response_parameter.msg,
                                    type: message_type
                                });
                                _this.list_data = [];
                                _this.page = {};
                            }
                        })
                        .catch(error => {
                            _this.fullscreen_loading = false;
                            _this.list_data = [];
                            _this.page = {};
                            console.log('error', error);
                        });
                },
                getUrl(url) {
                    let indexOf = url.indexOf("?");
                    if (-1 != indexOf) {
                        return url.substr(indexOf);
                    }
                    return null;
                }
            }
        }
    </script>
    @parent
@endsection
