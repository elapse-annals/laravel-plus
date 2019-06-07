<template>
    <el-row>
        <el-col :span="20">
            <el-button type="primary">新增</el-button>
        </el-col>
        <el-col :span="4">
            <el-button type="primary" @click="onSubmit">查询</el-button>
            <el-button @click="resetForm('search')">重置</el-button>
        </el-col>
    </el-row>
</template>