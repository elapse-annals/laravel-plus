<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use App\Presenters\TestPresenter;
use App\Transformers\TestTransformer;
use App\Formatters\TestFormatter;
use Illuminate\Support\Facades\Request;

/**
 * Class TestController
 *
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * @var TestService
     */
    protected $service;
    /**
     * @var TestTransformer
     */
    protected $transformer;
    /**
     * @var TestFormatter
     */
    protected $formatter;

    /**
     * @var bool
     */
    private $enable_transformer = false;
    /**
     * @var array
     */
    private $transformer_functions = ['index', 'show', 'edit'];

    /**
     * TestController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TestService(Request::all());
        if ($this->enable_transformer) {
            $this->transformer = new TestTransformer();
            $this->formatter = new TestFormatter();
        }
    }

    /**
     *
     */
    public function handle()
    {
    }

    /**
     * show list view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->service->index();
        $view_data = [
            'info'       => [
                'description' => 'xxx',
                'author'      => 'Ben',
                'title'       => 'index title',
            ],
            'js_data'    => [
                'data' => [
                    [
                        'id'   => 1,
                        'name' => 'ben',
                        'sex'  => 'man',
                    ], [
                        'id'   => 2,
                        'name' => 'test',
                        'sex'  => 'woman',
                    ],
                ],
                'page' => [
                    "current_page" => 1,
                ],
            ],
            'table_data' => [
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
            ],
        ];
        if ($this->enable_transformer && in_array('index', $this->transformer_functions)) {
            $this->transformer->index(
                $this->formatter->index()
            );
        }
        return view('test.index', $view_data);
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->service->store();
    }

    /**
     * create view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->service->create();
        $view_data = [
            'info'        => [
                'description' => 'xxx',
                'author'      => 'Ben',
                'title'       => 'index title',
            ],
            'js_data'     => [
                'data' => [
                    [
                        'id'   => 1,
                        'name' => 'ben',
                        'sex'  => 'man',
                    ], [
                        'id'   => 2,
                        'name' => 'test',
                        'sex'  => 'woman',
                    ],
                ],
                'page' => [
                    "current_page" => 1,
                ],
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
        return view('test.create', $view_data);
    }

    /**
     * show one view
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $this->service->show($id);
        $view_data = [
            'info'        => [
                'description' => 'xxx',
                'author'      => 'Ben',
                'title'       => 'index title',
            ],
            'js_data'     => [
                'data' => [
                    [
                        'id'   => 1,
                        'name' => 'ben',
                        'sex'  => 'man',
                    ], [
                        'id'   => 2,
                        'name' => 'test',
                        'sex'  => 'woman',
                    ],
                ],
                'page' => [
                    "current_page" => 1,
                ],
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
        return view('test.show', $view_data);
    }

    /**
     * update one
     *
     * @param Request $request
     * @param         $id
     */
    public function update(Request $request)
    {
        $this->service->update();
    }

    /**
     * delete one
     *
     * @param $id
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
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
        $this->service->edit($id);
        $view_data = [
            'info'        => [
                'description' => 'xxx',
                'author'      => 'Ben',
                'title'       => 'index title',
            ],
            'js_data'     => [
                'data' => [
                    [
                        'id'   => 1,
                        'name' => 'ben',
                        'sex'  => 'man',
                    ], [
                        'id'   => 2,
                        'name' => 'test',
                        'sex'  => 'woman',
                    ],
                ],
                'page' => [
                    "current_page" => 1,
                ],
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
        return view('test.edit', $view_data);
    }
}
