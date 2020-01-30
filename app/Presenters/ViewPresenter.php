<?php

namespace App\Presenters;

/**
 * Class ViewPresenter
 * @package App\Presenters
 */
class ViewPresenter extends Presenter
{
    /**
     * @param array  $list_map
     * @param string $view_html
     *
     * @return string
     */
    public function lists(array $list_map = [], string $view_html = ''): string
    {
        foreach ($list_map as $table_datum) {
            $view_html .= $this->tableColumn($table_datum);
        }
        return $view_html;
    }

    /**
     * @param array $column
     *
     * @return string
     */
    private function tableColumn(array $column): string
    {
        return <<<EOF
 <el-table-column
    prop="{$column['prop']}"
    label="{$column['label']}"
    min-width="190">
</el-table-column>

EOF;
    }

    /**
     * @param array  $list_map
     * @param string $view_html
     *
     * @return string
     */
    public function detail(array $list_map = [], string $view_html = ''): string
    {
        foreach ($list_map as $table_datum) {
            $view_html .= $this->getDetailCol($table_datum);
        }
        return $view_html;
    }

    private function getDetailCol($detail_datum)
    {
        return <<<EOF
<el-row>
    <el-col :span="4">
        <label for="{$detail_datum['prop']}">{$detail_datum['label']}</label>
    </el-col>
    <el-col :span="16">
        <el-input id="{$detail_datum['prop']}"
                  :class="{aggravation:detail_data.{$detail_datum['prop']}}"
                  v-model="detail_data.{$detail_datum['prop']}"
                  :disabled="is_disabled_edit"
                  placeholder="{$detail_datum['label']}"></el-input>
    </el-col>
</el-row>

EOF;
    }

    /**
     * @param array  $list_map
     * @param string $view_html
     *
     * @return string
     */
    public function search(array $list_map = [], string $view_html = ''): string
    {
        foreach ($list_map as $table_datum) {
            if (0 === substr_compare($table_datum['prop'], '_at', -strlen('_at'))) {
                $view_html .= $this->date($table_datum);
            } elseif (0 === substr_compare($table_datum['prop'], '_number', -strlen('_number'))) {
                $view_html .= $this->inputNumber($table_datum);
            } else {
                $view_html .= $this->input($table_datum);
            }
        }
        return $view_html;
    }

    /**
     * @param $column
     *
     * @return string
     */
    private function input($column)
    {
        return <<<EOF
                <el-form-item label="{$column['label']}">
                    <el-input v-model="search.{$column['prop']}"
                    placeholder="{$column['label']}">
                    </el-input>
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
                <el-form-item label="{$column['label']}">
                    <el-input v-model.number="search.{$column['prop']}" placeholder="{$column['label']}"></el-input>
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
                        v-model="search.{$column['prop']}"
                        type="datetimerange"
                        start-placeholder="{$column['label']} @lang('form.start_date')"
                        end-placeholder="{$column['label']} @lang('form.end_date')"
                        value-format="yyyy-MM-dd HH:mm"
                        format="yyyy-MM-dd HH:mm"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>

EOF;
    }

}
