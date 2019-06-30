<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\TempService;
use App\Transformers\TempTransformer;
use App\Formatters\TempFormatter;

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
                    'info'       => $this->getInfo(),
                    'temps'      => $this->service->getList(),
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
            $data = $request->input();
            $this->validateStoreRequest($data);
            return $this->service->store($data);
        } catch (Exception $exception) {
            return [$exception->getMessage(), $exception->getFile(), $exception->getLine()];
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

        if (! empty($rules)) {
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
                'info'        => $this->getInfo(),
                'js_data'     => [
                    'data' => [],
                ],
                'detail_data' => [
                    'id',
                    'name',
                    'sex',
                ],
            ];
            return view('temp.create', $view_data);
        } catch (Exception $exception) {
        }
    }

    /**
     * @param Request $request
     * @param int     $id
     * @param bool    $is_edit
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
                    'info'        => $this->getInfo(),
                    'js_data'     => [
                        'detail_data' => $temp,
                    ],
                    'detail_data' => [
                        'id',
                        'name',
                        'sex',
                    ],
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
     * @param         $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->input();
            $this->validateUpdateRequest($data, $id);
            $this->service->update($data);
        } catch (Exception $exception) {
            return response($exception->getMessage(), 500);
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
     */
    public function destroy(int $id)
    {
        try {
            $this->validateDestroy($id);
            $this->service->destroy($id);
        } catch (Exception $exception) {
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
            'author'      => 'Ben',
            'title'       => 'index title',
        ];
    }

    /**
     * @return array
     */
    private function getTableCommentMap(): array
    {
        return [
            [
                'prop'  => 'id',
                'label' => 'ID',
            ], [
                'prop'  => 'name',
                'label' => '名字',
            ], [
                'prop'  => 'sex',
                'label' => '性别',
            ],
        ];
    }

    /**
     * @param array  $data
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
