<template>
    @foreach ($detail_data as $detail_datum)
        <el-row>
            <el-col :span="4">
                <label for="{{$detail_datum['prop']}}">{{$detail_datum['label']}}</label>
            </el-col>
            <el-col :span="16">
                <el-input id="{{$detail_datum['prop']}}"
                          :class="{aggravation:detail_data.{{$detail_datum['prop']}}}"
                          v-model="detail_data.{{$detail_datum['prop']}}"
                          :disabled="is_disabled_edit"
                          placeholder="{{$detail_datum['label']}}"></el-input>
            </el-col>
        </el-row>
    @endforeach
</template>