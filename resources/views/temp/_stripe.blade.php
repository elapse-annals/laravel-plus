<template>
    <el-row>
        <el-col :span="19">
            <a href="/temps/create">
                <el-button type="primary" plain="true" icon="el-icon-plus">
                    新增
                </el-button>
            </a>
            <a href="/export/temps" target="_blank">
                <el-button  plain="true" icon="el-icon-download">导出</el-button>
            </a>
        </el-col>
        <el-col :span="5">
            <el-button type="primary" plain="true" @click="onSubmit()" icon="el-icon-search">查询</el-button>
            <el-button type="" plain="true" @click="resetForm('search')" icon="el-icon-refresh-left">重置</el-button>
            {{--            <el-button type="danger" plain="true" @click="deletes('ids')">删除</el-button>--}}
        </el-col>
    </el-row>
</template>