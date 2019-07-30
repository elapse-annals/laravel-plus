<template>
    <el-table
            :data="list_data"
            style="width: 100%"
            row-key="id"
            show-summary
            @selection-change="handleSelectionChange">
        <el-table-column
                type="selection"
                width="55">
        </el-table-column>
        @foreach ($list_data as $table_datum)
                <el-table-column
                        prop="{{$table_datum['prop']}}"
                        label="{{$table_datum['label']}}"
                        min-width="180"
                >
                </el-table-column>
        @endforeach
        <el-table-column
                fixed="right"
                label="操作"
                width="160"
                header-align="center"
        >
            <template slot-scope="scope">
                <a :href="'/temps/'+scope.row.id">
                    <el-button size="small" type="primary" plain="true"
                               icon="el-icon-zoom-in"></el-button>
                </a>
                <a :href="'/temps/'+scope.row.id+'/edit'">
                    <el-button size="small" type="primary" plain="true" icon="el-icon-edit"></el-button>
                </a>
                <el-button size="small" type="danger" plain="true" icon="el-icon-delete"
                           @click="deleteRow(scope.row.id)"></el-button>
            </template>
        </el-table-column>
    </el-table>


</template>