<el-form :inline="true" :model="search" class="demo-form-inline">
    <div class="block">
        @foreach ($search_map as $table_datum)
            @if (0 === substr_compare($table_datum['prop'],'_at',-strlen('_at')))
                <el-date-picker
                        v-model="search.{{$table_datum['prop']}}"
                        type="datetimerange"
                        start-placeholder="{{$table_datum['label']}} lang('form.start_date')"
                        end-placeholder="{{$table_datum['label']}} lang('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>
            @elseif (0 === substr_compare($table_datum['prop'],'_number',-strlen('_number')))
                <el-form-item label="{{$table_datum['label']}}">
                    <el-input v-model.number="search.{{$table_datum['prop']}}"
                              placeholder="{{$table_datum['label']}}"></el-input>
                </el-form-item>
            @else
                <el-form-item label="{{$table_datum['label']}}">
                    <el-input v-model="search.{{$table_datum['prop']}}"
                              placeholder="{{$table_datum['label']}}"></el-input>
                </el-form-item>
            @endif
        @endforeach
    </div>
</el-form>
