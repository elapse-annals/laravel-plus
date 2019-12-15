<template>
    <el-table
            :data="list_data"
            style="width: 100%"
            show-summary
            @selection-change="handleSelectionChange">
        <el-table-column
                type="selection"
                width="55">
        </el-table-column>

        @foreach($list_map as $table_datum)
                @if(isset($table_datum['is_array']) && true === $table_datum['is_array'])
                    <el-table-column min-width="180">
                        <template slot-scope="scope" width="200">
                            <el-table :data="scope.row.info" style="width: 100%">
                                @foreach($table_datum['child_map'] as $item)
                                    <el-table-column
                                            prop="{{$item['prop']}}"
                                            label="{{$item['label']}}"
                                            min-width="180">
                                    </el-table-column>
                                @endforeach
                            </el-table>
                        </template>
                    </el-table-column>
                @else
                    <el-table-column
                            prop="{{$table_datum['prop']}}"
                            label="{{$table_datum['label']}}"
                            min-width="180"
                    >
                    </el-table-column>
                @endif
            @endforeach

        <el-table-column
                fixed="right"
                label="操作"
                width="160"
                header-align="center"
        >
            <template slot-scope="scope">
                <a :href="'/languages/'+scope.row.id">
                    <el-button size="small" type="primary" plain
                               icon="el-icon-zoom-in"></el-button>
                </a>
                <a :href="'/languages/'+scope.row.id+'/edit'">
                    <el-button size="small" type="primary" plain icon="el-icon-edit"></el-button>
                </a>
                <el-button size="small" type="danger" plain icon="el-icon-delete"
                           @click="deleteRow(scope.row.id)"></el-button>
            </template>
        </el-table-column>
    </el-table>
</template>