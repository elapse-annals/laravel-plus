<template>
    <el-row>
        <el-col :span="19">
            <a href="/languages/create">
                <el-button type="primary" plain icon="el-icon-plus">
                    新增
                </el-button>
            </a>
            <a href="/export/languages" target="_blank">
                <el-button  plain icon="el-icon-download">导出</el-button>
            </a>
        </el-col>
        <el-col :span="5">
            <el-button type="primary" plain @click="onSubmit()" icon="el-icon-search">查询</el-button>
            <el-button type="" plain @click="resetForm('search')" icon="el-icon-refresh-left">重置</el-button>
        </el-col>
    </el-row>
</template>