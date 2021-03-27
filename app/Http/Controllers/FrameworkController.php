<?php

namespace App\Http\Controllers;

use App\Exceptions\FrameworkException;
use App\Presenters\ViewPresenter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class FrameworkController
 *
 * @package App\Http\Controllers
 */
class FrameworkController extends Controller
{
    /**
     * @var
     */
    private $file;
    /**
     * @var string
     */
    private $framework_name;
    /**
     * @var string
     */
    private $framework_name_plural;
    /**
     * @var string
     */
    private $framework_name_snake;
    /**
     * @var string
     */
    private $framework_name_snake_plural;
    /**
     * @var
     */
    private $file_path;
    /**
     * @var  ViewPresenter
     */
    private $ViewPresenter;
    /**
     * @var
     */
    private $model_map;

    /**
     * FrameworkController constructor.
     *
     * @param $framework_name
     */
    public function __construct($framework_name)
    {
        parent::__construct();
        $this->framework_name = ucfirst(Str::singular($framework_name));
        //        $this->framework_name_plural = Str::plural($this->framework_name);
        $this->framework_name_snake = Str::snake($this->framework_name);
        $this->framework_name_snake_plural = Str::plural($this->framework_name_snake);
    }

    /**
     * @param      $framework_file_type
     * @param      $is_delete
     * @param bool $is_force
     *
     * @throws FileNotFoundException
     * @throws FrameworkException
     */
    public function handle($framework_file_type, $is_delete, $is_force = false): void
    {
        $this->initFilePath($framework_file_type);
        $temp_framework_file_type = $framework_file_type;
        if ('TestUnit' === $framework_file_type) {
            $temp_framework_file_type = 'Test';
        }
        $this->file = app_path("{$this->file_path}/{$this->framework_name}{$temp_framework_file_type}.php");
        if ($is_delete) {
            $this->delete($framework_file_type);
        } elseif ('Test' === $framework_file_type || 'TestUnit' === $framework_file_type) {
            $this->createTest($framework_file_type);
        } else {
            if (true === $is_force) {
                $this->delete($framework_file_type);
            }
            $this->checkFileExistence($framework_file_type);
            $this->create($framework_file_type);
        }
    }

    /**
     * @param $framework_file_type
     */
    public function initFilePath($framework_file_type): void
    {
        switch ($framework_file_type) {
            case 'Controller':
                $this->file_path = 'Http/Controllers';
                break;
            case 'Repository':
                $this->file_path = 'Repositories';
                break;
            case 'Service':
            case 'Presenter':
            case 'Transformer':
            case 'Formatter':
            case 'Export':
                $this->file_path = $framework_file_type . 's';
                break;
            case 'Test':
                $this->file_path = '../tests/Feature';
                break;
            case 'TestUnit':
                $this->file_path = '../tests/Unit';
                break;
        }
    }

    /**
     * @param $framework_file_type
     *
     * @throws FrameworkException
     */
    private function checkFileExistence($framework_file_type): void
    {
        if (is_file($this->file)) {
            throw new FrameworkException("{$this->framework_name}{$framework_file_type}.php existing!");
        }
    }

    /**
     * @param $framework_file_type
     */
    public function delete($framework_file_type): void
    {
        $file = $this->file;
        if (file_exists($file)) {
            unlink($file);
        }
        if ('Controller' === $framework_file_type) {
            $new_directory = base_path("resources/views/{$this->framework_name_snake_plural}");
            exec("rm -rf {$new_directory}");
            $route_types = ['web', 'api'];
            foreach ($route_types as $route_type) {
                $this->deleteRoute($route_type);
            }
        }
        usleep(1000);
    }

    /**
     * @param $route_type
     */
    private function deleteRoute($route_type): void
    {
        switch ($route_type) {
            case 'api':
                $resource_type = 'apiResource';
                break;
            case 'web':
            default:
                $resource_type = 'resource';
        }
        $route_web_path = base_path("routes/{$route_type}.php");
        $route_string = "Route::{$resource_type}('{$this->framework_name_snake_plural}'," .
            " '{$this->framework_name}Controller');";
        $file_get_contents = file_get_contents($route_web_path);
        $file_get_contents = str_replace($route_string, '', $file_get_contents);
        file_put_contents($route_web_path, $file_get_contents);
    }

    /**
     * @param $framework_file_type
     *
     * @throws FileNotFoundException
     */
    private function create($framework_file_type): void
    {
        $this->framework_name_plural = Str::plural($this->framework_name);
        $Storage = Storage::disk('local');
        $body = $Storage->get("tmpl/framework/{$framework_file_type}.php");
        $body = str_replace(
            [
                'Tmpls',
                'Tmpl',
                'tmpls',
                'tmpl',
            ],
            [
                $this->framework_name_plural,
                $this->framework_name,
                $this->framework_name_snake_plural,
                $this->framework_name_snake,
            ],
            $body
        );
        $file = app_path("{$this->file_path}/{$this->framework_name}{$framework_file_type}.php");
        if (! is_file($file)) {
            file_put_contents($file, $body);
        }
        if ('Controller' === $framework_file_type) {
            $tmpl_resources_directory = storage_path('app/tmpl/views');
            $resources_directory = base_path("resources/views/{$this->framework_name_snake_plural}");
            exec("cp -r {$tmpl_resources_directory} {$resources_directory}");
            $route_types = ['web', 'api'];
            foreach ($route_types as $route_type) {
                $this->insertRoute($route_type);
            }
            $framework_view_files = scandir($resources_directory);
            $this->ViewPresenter = new ViewPresenter();
            $this->model_map = $this->getModelMap();
            foreach ($framework_view_files as $framework_view_file) {
                if (! in_array($framework_view_file, ['.', '..'])) {
                    $route_web_path = $resources_directory . '/' . $framework_view_file;
                    if (is_dir($route_web_path)) {
                        continue;
                    }
                    $file_get_contents = file_get_contents($route_web_path);
                    $file_get_contents = str_replace(
                        ['tmpls', 'tmpl'],
                        [$this->framework_name_snake_plural, $this->framework_name_snake],
                        $file_get_contents
                    );
                    $file_get_contents = $this->generateStaticView($framework_view_file, $file_get_contents);
                    file_put_contents($route_web_path, $file_get_contents);
                }
            }
        }
        usleep(1000);
    }

    /**
     * @param $framework_file_type
     */
    private function createTest($framework_file_type): void
    {
        if ('Test' === $framework_file_type) {
            exec("php artisan make:test {$this->framework_name}Test");
        }
        if ('TestUnit' === $framework_file_type) {
            exec("php artisan make:test {$this->framework_name}Test --unit");
        }
    }

    /**
     * @param $file_name
     * @param $data
     *
     * @return string|string[]
     */
    private function generateStaticView($file_name, $data)
    {
        $replace_data = '';
        switch ($file_name) {
            case '_list.blade.php':
                $replace_data = $this->ViewPresenter->lists($this->model_map);
                break;
            case '_detail.blade.php':
                $replace_data = $this->ViewPresenter->detail($this->model_map);
                break;
            case '_search.blade.php':
                $replace_data = $this->ViewPresenter->search($this->model_map);
                break;
        }
        $data = str_replace('%Placeholder%', $replace_data, $data);
        return $data;
    }

    /**
     * @return array
     */
    private function getModelMap(): array
    {
        if (! is_file(app_path('Models') . '/' . $this->framework_name . '.php')) {
            echo 'Model ' . app_path('Models') . '/' . $this->framework_name . '.php not exist' . PHP_EOL;
            return [];
        }
        return $this->getTableCommentMap($this->framework_name_snake_plural);
    }

    /**
     * @param $route_type
     */
    private function insertRoute($route_type): void
    {
        switch ($route_type) {
            case 'api':
                $resource_type = 'apiResource';
                break;
            case 'web':
            default:
                $resource_type = 'resource';
        }
        $route_web_path = base_path("routes/{$route_type}.php");
        $route_string = "Route::{$resource_type}('{$this->framework_name_snake_plural}'," .
            " '{$this->framework_name}Controller');";
        file_put_contents($route_web_path, $route_string . PHP_EOL, FILE_APPEND);
    }

    /**
     *
     */
    public function removesScaffold(): void
    {
        $files = [
            base_path('self-update'),
            base_path('update'),
            base_path('create'),
        ];
        foreach ($files as $file) {
            exec("rm -rf {$file}");
        }
    }
}
