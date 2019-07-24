<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\TempService;
use App\Transformers\TempTransformer;
use App\Formatters\TempFormatter;
use Illuminate\Support\Str;

/**
 * Class TempController
 *
 * @package App\Http\Controllers
 */
class TempController extends Controller
{
    /**
     * @var TempService
     */
    protected $service;
    /**
     * TempFormatter
     *
     * @var TempFormatter
     */
    private $formatter;
    /**
     * @var TempTransformer
     */
    private $transformer;

    /**
     * @var bool
     */
    private $enable_filter = true;
    /**
     * @var array
     */
    private $transformer_functions = ['index', 'show', 'edit'];

    /**
     * TempController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TempService();
        if ($this->enable_filter) {
            $this->formatter = new TempFormatter();
            $this->transformer = new TempTransformer();
        }
    }

    /**
     * @param Request $request
     *
     * @return array|\Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            $data = $request->input();
            $this->validationIndexRequest($data);
            $temps = $this->service->getList();
            if ($request->is('api/*')) {
                return $temps;
            }
            $view_data = $this->filter(
                [
                    'info' => $this->getInfo(),
                    'temps' => $this->service->getList(),
                    'table_data' => $this->getTableCommentMap(),
                ],
                __FUNCTION__
            );
            return view('temp.index', $view_data);
        } catch (Exception $exception) {
            return [$exception->getMessage(), $exception->getFile(), $exception->getLine()];
        }
    }

    /**
     * @param array $data
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validationIndexRequest(array $data): void
    {
        $rules = [
        ];
        $messages = [
            'page' => '分页',
        ];
        if ($rules) {
            $this->validate($data, $rules, $messages);
        }
    }

    /**
     * @param Request $request
     *
     * @return array|int
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->input();
            $this->validateStoreRequest($data);
            $store_status = $this->service->store($data);
            DB::commit();
            return $store_status;
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->catchException($exception, 'api');
        }
    }

    /**
     * @param $data
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateStoreRequest($data)
    {
        $rules = [];
        $messages = [];
        if (!empty($rules)) {
            $this->validate($data, $rules, $messages);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        try {
            $view_data = [
                'info' => $this->getInfo(),
                'js_data' => [
                    'data' => [],
                ],
                'detail_data' => $this->getTableCommentMap(),
            ];
            return view('temp.create', $view_data);
        } catch (Exception $exception) {
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @param bool $is_edit
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Request $request, int $id, $is_edit = false)
    {
        try {
            $this->validationShowRequest($id);
            $temp = $this->service->getIdInfo($id);
            $view_data = $this->filter(
                [
                    'info' => $this->getInfo(),
                    'js_data' => [
                        'detail_data' => $temp,
                    ],
                    'detail_data' => $this->getTableCommentMap(),
                ],
                __FUNCTION__
            );
            if ($request->is('api/*') || $is_edit) {
                return $view_data;
            }
            return view('temp.show', $view_data);
        } catch (Exception $exception) {
            return $this->catchException($exception);
        }
    }

    /**
     * @param $id
     *
     * @throws Exception
     */
    private function validationShowRequest($id)
    {
        if (empty($id)) {
            throw new Exception(trans('request id is null'));
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|int
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->input();
            $this->validateUpdateRequest($data, $id);
            $res_db = $this->service->update($data, $id);
            DB::commit();
            if ($request->is('api/*')) {
                return $res_db;
            }
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->catchException($exception, 'api');
        }
    }

    /**
     * @param $id
     * @param $data
     *
     * @throws Exception
     */
    private function validateUpdateRequest($data, $id)
    {
        $this->validateRequestId($id);
    }

    /**
     * @param int $id
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws Exception
     */
    public function destroy(int $id)
    {
        try {
            DB::beginTransaction();
            $this->validateDestroy($id);
            $res_db = $this->service->destroy($id);
            return $this->successReturn($res_db);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->catchException($exception, 'api');
        }
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    private function validateDestroy(int $id)
    {
        $this->validateRequestId($id);
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $view_data = $this->show($request, $id, true);
        return view('temp.edit', $view_data);
    }

    /**
     * @return array
     */
    private function getInfo(): array
    {
        return [
            'description' => 'xxx',
            'author' => 'Ben',
            'title' => 'index title',
        ];
    }

    /**
     * @return array
     */
    private function getTableCommentMap(): array
    {
        $table_maps = Cache::remember('map_TbSystemAbnormalSentinel', 1440, function () {
            $table = Str::str_plural(Str::snake_case('TbSystemAbnormalSentinel'));
            $table_column_dbs = DB::connection('mysql')->select("show full columns from {$table}");
            $table_columns = array_column($table_column_dbs, 'Comment', 'Field');
            $filter_words = [
                'deleted_by',
                'deleted_at',
            ];
            foreach ($table_columns as $key => $table_column) {
                if (empty($table_column)) {
                    $table_column = $key;
                }
                if (!in_array($key, $filter_words)) {
                    $show_columns[] = [
                        'prop' => $key,
                        'label' => $table_column
                    ];
                }
            }
            return serialize($show_columns);
        });
        return unserialize($table_maps);
    }

    /**
     * @param array $data
     * @param string $controller_function
     *
     * @return array
     */
    private function filter(array $data, string $controller_function): array
    {
        if ($this->enable_filter && in_array($controller_function, $this->transformer_functions)) {
            $controller_plural = ucfirst($controller_function);
            $formatterKey = 'format' . $controller_plural;
            $transformKey = 'transform' . $controller_plural;
            return $this->transformer->{$transformKey}(
                $this->formatter->{$formatterKey}($data)
            );
        }
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    private function validateRequestId(int $id): void
    {
        if (empty($id)) {
            throw new Exception('request id is empty');
        }
    }


}
