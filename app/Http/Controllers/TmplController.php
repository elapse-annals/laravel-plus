<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Exports\TmplExport;
use App\Formatters\TmplFormatter;
use App\Transformers\TmplTransformer;
use App\Services\TmplService;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Class TmplController
 *
 * @package App\Http\Controllers
 */
class TmplController extends Controller
{
    /**
     * @var TmplService
     */
    protected $service;
    /**
     * TmplFormatter
     *
     * @var TmplFormatter
     */
    private $formatter;
    /**
     * @var TmplTransformer
     */
    private $transformer;

    /**
     * @var bool
     */
    private $enable_filter = true;

    /**
     * TmplController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TmplService();
        if ($this->enable_filter) {
            $this->formatter = new TmplFormatter();
            $this->transformer = new TmplTransformer();
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
            if (true == $request->input('api')) {
                $data = array_map(function ($datum) {
                    return json_decode($datum, true);
                }, $data);
            }
            $this->validationIndexRequest($data);
            $tmpls = $this->service->getList($data);
            if ($request->is('api/*') || true == $request->input('api')) {
                return $this->successReturn($tmpls, $this->formatter->assemblyPage($tmpls));
            }
            $table_comment_map = $this->getTableCommentMap('tmpls');
            //            $table_comment_map = $this->appendAssociationModelMap($table_comment_map);
            $view_data = [
                'info'       => $this->getInfo('index'),
                'tmpls'      => $tmpls,
                'list_map'   => $table_comment_map,
                'search_map' => $table_comment_map,
            ];
            if ($this->enable_filter) {
                $view_data = $this->transformer->transformIndex(
                    $this->formatter->formatIndex($view_data)
                );
            }
            return view('tmpls.index', $view_data);
        } catch (Exception $exception) {
            return [$exception->getMessage(), $exception->getFile(), $exception->getLine()];
        }
    }

    /**
     * @param array $data
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validationIndexRequest(array $data)
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
            return $this->successReturn($store_status);
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
                'info'        => $this->getInfo('create'),
                'js_data'     => [
                    'data' => [],
                ],
                'detail_data' => $this->getTableCommentMap('tmpls'),
            ];
            return view('tmpls.create', $view_data);
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
            $tmpl = $this->service->getIdInfo($id);
            $view_data = [
                'info'        => $this->getInfo('show'),
                'js_data'     => [
                    'detail_data' => $tmpl,
                ],
                'detail_data' => $this->getTableCommentMap('tmpls'),
            ];
            if ($this->enable_filter) {
                $view_data = $this->transformer->transformShow(
                    $this->formatter->formatShow($view_data)
                );
            }
            if ($request->is('api/*') || true == $request->input('api') || $is_edit) {
                return $view_data;
            }
            return view('tmpls.show', $view_data);
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
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->input();
            $this->validateUpdateRequest($data, $id);
            $res_db = $this->service->update($data, $id);
            DB::commit();
            if ($request->is('api/*') ||
                true == $request->input('api') ||
                'json' === $request->getContentType()
            ) {
                return $this->successReturn($res_db);
            }
            $view_data = $this->show($request, $id, true);
            return view('tmpls.show', $view_data);
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
            DB::commit();
            return $this->successReturn($res_db);
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
        return view('tmpls.edit', $view_data);
    }

    /**
     * @param $type
     *
     * @return array
     */
    private function getInfo($type): array
    {
        return [
            'description' => "tmpl {$type} description",
            'author'      => 'Ben',
            'title'       => "tmpl {$type} title",
        ];
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

    public function export()
    {
        $excel_name = 'tmpl.xls';
        return Excel::download(new TmplExport, $excel_name);
    }

    public function testQueryDb()
    {
//        return 'yoyo';
        /*$act_time = microtime(true);
        $sum = 0;
        for ($i = 1; $i < 100000; $i++) {
            $sum = $sum * round(0, 1) + $sum;
        }
        return microtime(true) - $act_time;*/
        $act_time = microtime(true);
        for ($i = 1; $i < 10; $i++) {
            $res = DB::select("SELECT * FROM tmpls LIMIT {$i},1;");
        }
        return microtime(true) - $act_time;
    }
}
