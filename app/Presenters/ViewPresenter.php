<?php

namespace App\Presenters;

/**
 * Class Presenter
 *
 * @package App\Presenters
 */
class ViewPresenter extends Presenter
{
    /**
     * @param $list_map
     * @param $is_static_render
     *
     * @return string
     */
    public function lists($list_map = [], $is_static_render = false)
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

    /**
     * @return string
     */
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
                                            min-width="180">
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

    /**
     * @param $column
     *
     * @return string
     */
    private function tableColumn($column)
    {
        return <<<EOF
 <el-table-column prop="{$column['prop']}" label="{$column['label']}" min-width="180"></el-table-column>
EOF;
    }

    /**
     * @param $column_array
     *
     * @return string
     */
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

    /**
     * @param $column
     *
     * @return string
     */
    private function input($column)
    {
        return <<<EOF
                <el-form-item label="{{$column['label']}}">
                    <el-input v-model="search.{{$column['prop']}}" placeholder="{{$column['label']}}"></el-input>
                </el-form-item>
EOF;
    }

    /**
     * @param $column
     *
     * @return string
     */
    private function inputNumber($column)
    {
        return <<<EOF
                <el-form-item label="{{$column['label']}}">
                    <el-input v-model.number="search.{{$column['prop']}}" placeholder="{{$column['label']}}"></el-input>
                </el-form-item>
EOF;
    }

    /**
     * @param $column
     *
     * @return string
     */
    private function date($column)
    {
        return <<<EOF
                <el-date-picker
                        v-model="search.{{$column['prop']}}"
                        type="datetimerange"
                        start-placeholder="{{$column['label']}} @lang('form.start_date')"
                        end-placeholder="{{$column['label']}} @lang('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>
EOF;
    }

    /**
     *
     */
    private function ChileArray()
    {
    }
}
