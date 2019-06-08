<?php

namespace App\Http\Controllers;

use App\Services\TempService;
use App\Presenters\TempPresenter;
use App\Transformers\TempTransformer;
use App\Formatters\TempFormatter;
use Illuminate\Support\Facades\Request;

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
    protected $transformer;
    /**
     * @var TempFormatter
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
     * TempController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TempService(Request::all());
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
                        'name' => 'Temp',
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
        return view('temp.index', $view_data);
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
                        'name' => 'Temp',
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
        return view('temp.create', $view_data);
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
                        'name' => 'Temp',
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
        return view('temp.show', $view_data);
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
                        'name' => 'Temp',
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
        return view('temp.edit', $view_data);
    }
}
