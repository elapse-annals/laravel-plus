<?php

namespace App\Presenters;

/**
 * Class Presenter
 *
 * @package App\Presenters
 */
class ViewPresenter extends Presenter
{
    public function lists($list_map, $is_static_render)
    {
        $view_html = '';
        if ($is_static_render) {
            foreach ($list_map as $table_datum) {
                if (isset($table_datum['is_array']) && true === $table_datum['is_array']) {
                    $view_html .= $this->tableColumnArray($table_datum);
                } else {
                    $view_html .= $this->tableColumn($table_datum);
                }
            }
        } else {
            $view_html = $this->autoTableColumn();
        }
        return $view_html;
    }

    private function autoTableColumn()
    {
        return '@foreach($list_map as $table_datum)
            @if(isset($table_datum[\'is_array\']) && true === $table_datum[\'is_array\'])
                <el-table-column min-width="180">
                    <template slot-scope="scope" width="200">
                        <el-table :data="scope.row.info" style="width: 100%">
                            @foreach($table_datum[\'child_map\'] as $item)
                                <el-table-column
                                        prop="{{$item[\'prop\']}}"
                                        label="{{$item[\'label\']}}"
                                        min-width="180"
                                >
                                </el-table-column>
                            @endforeach
                        </el-table>
                    </template>
                </el-table-column>
            @else
                <el-table-column
                        prop="{{$table_datum[\'prop\']}}"
                        label="{{$table_datum[\'label\']}}"
                        min-width="180"
                >
                </el-table-column>
            @endif
        @endforeach';

    }

    private function tableColumn($column)
    {
        return <<<EOF
 <el-table-column prop="{$column['prop']}" label="{$column['label']}" min-width="180"></el-table-column>
EOF;
    }

    private function tableColumnArray($column_array)
    {
        $temp_view = <<<EOF
        <el-table-column min-width="180" >
                    <template slot-scope="scope" width="200">
                        <el-table :data="scope.row.info" style="width: 100%">
                           
EOF;
        foreach ($column_array['child_map'] as $item) {
            $temp_view .= $this->tableColumn($item);
        }
        $temp_view .= <<<EOF
                        </el-table>
                    </template>
                </el-table-column>
EOF;

        return $temp_view;

    }

    private function button()
    {

    }

    private function date()
    {

    }

    private function text()
    {

    }

    private function ChileArray()
    {

    }
}
