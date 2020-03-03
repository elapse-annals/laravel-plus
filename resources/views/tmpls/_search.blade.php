<el-form :inline="true" :model="search" class="demo-form-inline">
    <div class="block">
                        <el-form-item label="id">
                    <el-input v-model="search.id"
                    placeholder="id">
                    </el-input>
                </el-form-item>
                <el-form-item label="名称">
                    <el-input v-model="search.name"
                    placeholder="名称">
                    </el-input>
                </el-form-item>
                <el-form-item label="性别">
                    <el-input v-model="search.sex"
                    placeholder="性别">
                    </el-input>
                </el-form-item>
                <el-date-picker
                        v-model="search.created_at"
                        type="datetimerange"
                        start-placeholder="created_at ('form.start_date')"
                        end-placeholder="created_at ('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>
                <el-form-item label="created_by">
                    <el-input v-model="search.created_by"
                    placeholder="created_by">
                    </el-input>
                </el-form-item>
                <el-date-picker
                        v-model="search.updated_at"
                        type="datetimerange"
                        start-placeholder="updated_at lang('form.start_date')"
                        end-placeholder="updated_at lang('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>
                <el-form-item label="updated_by">
                    <el-input v-model="search.updated_by"
                    placeholder="updated_by">
                    </el-input>
                </el-form-item>

    </div>
</el-form>
