<el-form :inline="true" :model="search" class="demo-form-inline">
    <div class="data-list">
        @lang('form.data_list'): @{{ search?search:null }}
    </div>
    <div class="block">
        <label>@lang('form.date')：</label>
        <el-date-picker
                v-model="search.date"
                type="daterange"
                start-placeholder="@lang('form.start_date')"
                end-placeholder="@lang('form.end_date')"
                value-format="yyyy-MM-dd HH:mm"
                format="yyyy-MM-dd HH:mm"
                :default-time="['00:00:00', '23:59:59']">
        </el-date-picker>
        <el-form-item label="@lang('form.input_box')">
            <el-input v-model="search.input" placeholder="@lang('form.input_box')"></el-input>
        </el-form-item>
        <el-form-item label="@lang('form.drop_down_box')">
            <el-select v-model="search.drop_down_box" placeholder="@lang('form.drop_down_box')">
                <el-option label="@lang('form.drop_down_box_key',['key'=>1])" value="shanghai"></el-option>
                <el-option label="@lang('form.drop_down_box_key',['key'=>2])" value="beijing"></el-option>
            </el-select>
        </el-form-item>
    </div>
</el-form>