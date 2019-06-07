<template>
    <div class="block">
        <span class="demonstration">完整功能</span>
        <el-pagination
                @size-change="handleSizeChange"
                @current-change="handleCurrentChange"
                :current-page="page.current_page"
                :page-sizes="[10, 50, 100, 300]"
                :page-size="10"
                layout="total, sizes, prev, pager, next, jumper"
                :total="400">
        </el-pagination>
    </div>
</template>
