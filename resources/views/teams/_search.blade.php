<el-form :inline="true" :model="search" class="demo-form-inline">
    <div class="block">
                        <el-form-item label="id">
                    <el-input v-model="search.id"
                    placeholder="id">
                    </el-input>
                </el-form-item>
                <el-form-item label="user_id">
                    <el-input v-model="search.user_id"
                    placeholder="user_id">
                    </el-input>
                </el-form-item>
                <el-form-item label="name">
                    <el-input v-model="search.name"
                    placeholder="name">
                    </el-input>
                </el-form-item>
                <el-form-item label="personal_team">
                    <el-input v-model="search.personal_team"
                    placeholder="personal_team">
                    </el-input>
                </el-form-item>
                <el-date-picker
                        v-model="search.created_at"
                        type="datetimerange"
                        start-placeholder="created_at @lang('form.start_date')"
                        end-placeholder="created_at @lang('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>
                <el-date-picker
                        v-model="search.updated_at"
                        type="datetimerange"
                        start-placeholder="updated_at @lang('form.start_date')"
                        end-placeholder="updated_at @lang('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>

    </div>
</el-form>
