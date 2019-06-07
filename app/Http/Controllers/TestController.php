<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use App\Presenters\TestPresenter;
use App\Transformers\TestTransformer;
use App\Formatters\TestFormatter;

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
     * TestController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TestService();
    }

    /**
     *
     */
    public function handle()
    {
    }

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
        return view('test.index', $view_data);
    }

    public function store(Request $request)
    {
        $this->service->store();
    }

    public function create()
    {
        $this->service->create();
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
            'detail_data' => [
                'id',
                'name',
                'sex',
            ],
        ];
        return view('test.create', $view_data);
    }

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
        return view('test.show', $view_data);
    }

    public function update(Request $request, $id)
    {
        $this->service->update();

    }

    public function destroy($id)
    {
        $this->service->destroy($id);
    }

    public function edit($id)
    {
        $this->service->edit($id);
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
        return view('test.edit', $view_data);
    }
}
