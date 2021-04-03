<template>
    <el-table
        :data="list_data"
        style="width: 100%"
        show-summary
        @selection-change="handleSelectionChange">
         <el-table-column
    prop="id"
    label="id"
    min-width="190">
</el-table-column>
 <el-table-column
    prop="user_id"
    label="user_id"
    min-width="190">
</el-table-column>
 <el-table-column
    prop="name"
    label="name"
    min-width="190">
</el-table-column>
 <el-table-column
    prop="personal_team"
    label="personal_team"
    min-width="190">
</el-table-column>
 <el-table-column
    prop="created_at"
    label="created_at"
    min-width="190">
</el-table-column>
 <el-table-column
    prop="updated_at"
    label="updated_at"
    min-width="190">
</el-table-column>

        <el-table-column
            fixed="right"
            label="操作"
            width="200"
            header-align="center"
        >
            <template slot-scope="scope">
                <a :href="'/teams/'+scope.row.id">
                    <el-button size="small" type="primary" plain
                               icon="el-icon-zoom-in"></el-button>
                </a>
                <a :href="'/teams/'+scope.row.id+'/edit'">
                    <el-button size="small" type="primary" plain icon="el-icon-edit"></el-button>
                </a>
                <el-button size="small" type="danger" plain icon="el-icon-delete"
                           @click="deleteRow(scope.row.id)"></el-button>
            </template>
        </el-table-column>
    </el-table>
</template>
