<?php

namespace App\Http\Controllers;

use App\Exports\TeamExport;
use App\Formatters\TeamFormatter;
use App\Transformers\TeamTransformer;
use App\Services\TeamService;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


/**
 * Class TeamController
 *
 * @package App\Http\Controllers
 */
class TeamController extends Controller
{
    /**
     * @var TeamService
     */
    protected $service;
    /**
     * TeamFormatter
     *
     * @var TeamFormatter
     */
    private $formatter;
    /**
     * @var TeamTransformer
     */
    private $transformer;

    /**
     * @var bool
     */
    private $enable_filter = true;

    /**
     * TeamController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->service = new TeamService();
        if ($this->enable_filter) {
            $this->formatter = new TeamFormatter();
            $this->transformer = new TeamTransformer();
        }
    }

    /**
     *
     * @name get list view
     *
     * @param Request $request
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        try {
            $data = $request->input();
            if (true === $request->input('api')) {
                $data = array_map(function ($datum) {
                    return json_decode($datum, true, 512, JSON_THROW_ON_ERROR);
                }, $data);
            }
            $this->validationIndexRequest($data);
            $teams = $this->service->getList($data);
            if ($request->is('api/*') || true == $request->input('api')) {
                return $this->successReturn($teams, $this->formatter->assemblyPage($teams));
            }
            $table_comment_map = $this->getTableCommentMap('teams');
            //            $table_comment_map = $this->appendAssociationModelMap($table_comment_map);
            $view_data = [
                'info'       => $this->getInfo('index'),
                'teams'      => $teams,
                'list_map'   => $table_comment_map,
                'search_map' => $table_comment_map,
            ];
            if ($this->enable_filter) {
                $view_data = $this->transformer->transformIndex(
                    $this->formatter->formatIndex($view_data)
                );
            }
            return view('teams.index', $view_data);
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
     *
     * @name post
     *
     * @param Request $request
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
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
     * @param array $data
     */
    private function validateStoreRequest(array $data)
    {
        $rules = [];
        $messages = [];
        $rules = $this->dynamicVerification($rules);
        if (! empty($rules)) {
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->errors()) {
                throw new Exception($validator->errors()->first(), 416);
            }
        }
    }

    /**
     *
     * @name get view
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        try {
            $view_data = [
                'info'        => $this->getInfo('create'),
                'js_data'     => [
                    'data' => [],
                ],
                'detail_data' => $this->getTableCommentMap('teams'),
            ];
            return view('teams.create', $view_data);
        } catch (Exception $exception) {
        }
    }

    /**
     *
     * @name get
     *
     * @param Request $request
     * @param int     $id
     * @param false   $is_edit
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request, int $id, $is_edit = false)
    {
        try {
            $this->validationShowRequest($id);
            $team = $this->service->getIdInfo($id);
            $view_data = [
                'info'        => $this->getInfo('show'),
                'js_data'     => [
                    'detail_data' => $team,
                ],
                'detail_data' => $this->getTableCommentMap('teams'),
            ];
            if ($this->enable_filter) {
                $view_data = $this->transformer->transformShow(
                    $this->formatter->formatShow($view_data)
                );
            }
            if ($request->is('api/*') || true == $request->input('api') || $is_edit) {
                return $view_data;
            }
            return view('teams.show', $view_data);
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
     * @name put
     *
     * @param Request $request
     * @param         $id
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->input();
            $this->validateUpdateRequest($data, $id);
            $res_db = $this->service->update($data, $id);
            DB::commit();
            if ($request->is('api/*') || true == $request->input('api')
                || 'json' === $request->getContentType()) {
                return $this->successReturn($res_db);
            }
            $view_data = $this->show($request, $id, true);
            return view('teams.show', $view_data);
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
        $rules = [];
        $messages = [];
        $rules = $this->dynamicVerification($rules);
        if (! empty($rules)) {
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->errors()) {
                throw new Exception($validator->errors()->first(), 416);
            }
        }
    }

    /**
     *
     * @name delete
     *
     * @param int $id
     *
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
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
        return view('teams.edit', $view_data);
    }

    /**
     * @param $type
     *
     * @return array
     */
    private function getInfo($type): array
    {
        return [
            'description' => "team {$type} description",
            'author'      => 'Ben',
            'title'       => "team {$type} title",
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
        $excel_name = 'team.xls';
        return Excel::download(new TeamExport, $excel_name);
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
            $res = DB::select("SELECT * FROM teams LIMIT {$i},1;");
        }
        return microtime(true) - $act_time;
    }

    /**
     * @param array $rules
     *
     * @return array
     */
    private function dynamicVerification(array $rules): array
    {
        $nulls = $this->getTableNotNull('teams');
        if (! empty($nulls)) {
            foreach ($nulls as $null) {
                $temp_rules[$null] = 'required';
            }
        }
        return array_merge($rules, $temp_rules);
    }
}
