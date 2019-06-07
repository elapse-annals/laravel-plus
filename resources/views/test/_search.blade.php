<template>
    <div class="block">
        <label>组件值：@{{ search.date }}</label>
        <el-date-picker
                v-model="search.date"
                type="daterange"
                start-placeholder="@lang('page.start_date')"
                end-placeholder="@lang('page.end_date')"
                value-format="yyyy-MM-dd HH:mm"
                format="yyyy-MM-dd HH:mm"
                :default-time="['00:00:00', '23:59:59']">
        </el-date-picker>
    </div>
</template>
