<template>
    <el-row>
        <el-col :span="18">
            <el-button type="primary" plain="true">新增</el-button>
        </el-col>
        <el-col :span="6">
            <el-button type="primary" plain="true" @click="onSubmit">查询</el-button>
            <el-button plain="true" @click="resetForm('search')">重置</el-button>
            <el-button type="danger" plain="true" @click="resetForm('search')">删除</el-button>
        </el-col>
    </el-row>
</template>