<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
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
     * @var TempTransformer
     */
    private $transformer;
    /**
     * @var TempFormatter
     */
    private $formatter;

    /**
     * @var bool
     */
    private $enable_transformer = false;
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
        if ($this->enable_transformer) {
            $this->transformer = new TempTransformer();
            $this->formatter = new TempFormatter();
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
            $view_data = [
                'info'       => $this->getInfo(),
                'js_data'    => [
                    'data' => $temps->items(),
                    'page' => [
                        "current_page" => $temps->currentPage(),
                        "sizes"        => [10, 50, 100, 300],
                        "per_page"     => $temps->perPage(),
                    ],
                ],
                'table_data' => $this->getTableCommentMap(),
            ];
            if ($this->enable_transformer && in_array('index', $this->transformer_functions)) {
                $this->transformer->index(
                    $this->formatter->index()
                );
            }
            if (0 === strpos($request->getRequestUri(), '/api/')) {
                return $temps;
            }
            return view('temp.index', $view_data);
        } catch (Exception $exception) {
            return [$exception->getMessage(), $exception->getFile(), $exception->getLine()];
        }
    }

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
            if ($this->enable_transformer && in_array('index', $this->transformer_functions)) {
                $this->transformer->index(
                    $this->formatter->index()
                );
            }
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
            $view_data = [
                'info'        => $this->getInfo(),
                'js_data'     => [
                    'detail_data' => $temp,
                ],
                'detail_data' => [
                    'id',
                    'name',
                    'sex',
                ],
            ];
            if ($this->enable_transformer && in_array('index', $this->transformer_functions)) {
                $this->transformer->index(
                    $this->formatter->index()
                );
            }
            if (0 === strpos($request->getRequestUri(), '/api/')) {
                return $view_data;
            }
            return view('temp.show', $view_data);
        } catch (Exception $exception) {
            return response($exception->getMessage(), 500);
        }
    }

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
        $view_data = [
            'info'        => $this->getInfo(),
            'js_data'     => [
                'detail_data' => $temp,
            ],
            'detail_data' => [
                'id',
                'name',
                'sex',
            ],
        ];
        if ($this->enable_transformer && in_array('edit', $this->transformer_functions)) {
            $this->transformer->index(
                $this->formatter->index()
            );
        }
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
}
