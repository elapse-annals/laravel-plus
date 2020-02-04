<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

/**
 * Class Controller
 *
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var
     */
    protected $service;


    /**
     *
     */
    public const SUCCESS_CODE = 200;

    /**
     *
     */
    public const ERROR_CODE = 500;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param null   $data
     * @param array  $page
     * @param string $message
     *
     * @return array
     */
    protected function successReturn($data = null, $page = [], $message = 'success'): array
    {
        $response = [
            'code' => self::SUCCESS_CODE,
            'msg'  => $message,
            'data' => $data,
        ];
        if ($page) {
            $response['page'] = $page;
        }
        return $response;
    }

    /**
     * @param Exception $exception
     * @param null      $type
     *
     * @return array|ResponseFactory|Response
     */
    public function catchException(Exception $exception, $type = null)
    {
        $code = self::ERROR_CODE;
        if ($exception->getCode()) {
            $code = $exception->getCode();
        }
        if ('api' === $type) {
            return [
                'code' => $code,
                'data' => ['error_file' => $exception->getFile() . ':' . $exception->getLine()],
                'msg'  => $exception->getMessage(),
            ];
        }
        return response($exception->getMessage(), $code);
    }

    /**
     * @param null   $table_name
     * @param string $connection_name
     *
     * @return array
     */
    protected function getTableCommentMap($table_name = null, $connection_name = 'mysql'): array
    {
        $table_maps = Cache::remember(
            'map_' . $table_name,
            1,
            static function () use ($table_name, $connection_name) {
                if (empty($table_name)) {
                    $table_name = Str::plural(Str::snake($table_name));
                }
                $table_column_dbs = DB::connection($connection_name)->select("show full columns from {$table_name}");
                $table_columns = array_column($table_column_dbs, 'Comment', 'Field');
                $filter_words = [
                    'deleted_by',
                    'deleted_at',
                ];
                $show_columns = [];
                foreach ($table_columns as $key => $table_column) {
                    if (empty($table_column)) {
                        $table_column = $key;
                    }
                    if (! in_array($key, $filter_words, false)) {
                        $show_columns[] = [
                            'prop'  => $key,
                            'label' => $table_column,
                        ];
                    }
                }
                return serialize($show_columns);
            }
        );
        return unserialize($table_maps, ['allowed_classes' => false]);
    }

    /**
     * @param array $table_comment_map
     * @param array $child_map_lists
     *
     * @return array
     */
    protected function appendAssociationModelMap(array $table_comment_map, array $child_map_lists): array
    {
        $child_maps = [];
        foreach ($child_map_lists as $child_map_list) {
            $child_maps = [
                [
                    'prop'      => $child_map_list['prop'],
                    'label'     => $child_map_list['label'],
                    'is_array'  => true,
                    'child_map' => [
                        $this->getTableCommentMap($child_map_list['prop']),
                    ],
                ],
            ];
        }
        foreach ($child_maps as $child_map) {
            $table_comment_map[] = $child_map;
        }
        return $table_comment_map;
    }
}
