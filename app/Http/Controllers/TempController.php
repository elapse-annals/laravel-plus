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
     *
     */
    public function handle()
    {
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
            if (0 === strpos($request->getRequestUri(), '/api/')) {
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
     */
    private function validationIndexRequest(array $data): void
    {
        $rules = [
            'page' => '',
        ];
        $messages = [
            'page' => '分页',
        ];
        //        $this->validate($request, $rules, $messages);
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
     */
    private function validateStoreRequest($data)
    {
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
     * @param         $id
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Request $request, $id)
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
                    'detail_data' => [
                        'id',
                        'name',
                        'sex',
                    ],
                ],
                __FUNCTION__
            );
            if (0 === strpos($request->getRequestUri(), '/api/')) {
                return $view_data;
            }
            return view('temp.show', $view_data);
        } catch (Exception $exception) {
            return response($exception->getMessage(), 500);
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
     * @param $data
     * @param $id
     *
     * @throws Exception
     */
    private function validateUpdateRequest($data, $id)
    {
        if (empty($id)) {
            throw new Exception('id is empty');
        }
    }

    /**
     * @param int $id
     */
    public function destroy(int $id)
    {
        try {
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
        if (empty($id)) {
            throw new Exception('id is empty');
        }
    }

    /**
     * update one view
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $temp = $this->service->getIdInfo($id);
        $view_data = $this->filter(
            [
                'info' => $this->getInfo(),
                'js_data' => [
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
        return [
            [
                'prop' => 'id',
                'label' => 'ID',
            ], [
                'prop' => 'name',
                'label' => '名字',
            ], [
                'prop' => 'sex',
                'label' => '性别',
            ],
        ];
    }

    /**
     * @param        $data
     * @param string $controller_function
     *
     * @return mixed
     */
    private function filter($data, string $controller_function)
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
}
