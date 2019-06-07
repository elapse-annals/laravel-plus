<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

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
     * @var
     */
    private $file_path;

    /**
     * FrameworkController constructor.
     *
     * @param $framework_name
     */
    public function __construct($framework_name)
    {
        parent::__construct();
        $this->framework_name = ucfirst($framework_name);
    }

    /**
     * @param $framework_file_type
     * @param $framework_name
     */
    public function init($framework_file_type, $framework_name): void
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
                $this->file_path = $framework_file_type . 's';
                break;
        }
    }

    /**
     * @param $framework_file_type
     * @param $is_delete
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle($framework_file_type, $is_delete)
    {
        $this->init($framework_file_type, $this->framework_name);
        $this->file = app_path("{$this->file_path}/{$this->framework_name}{$framework_file_type}.php");
        if ($is_delete) {
            $this->delete($framework_file_type);
        } else {
            $this->checkFileExistence($framework_file_type);
            $this->create($framework_file_type);
        }
    }

    /**
     *
     */
    private function checkFileExistence($framework_file_type)
    {
        if (is_file($this->file)) {
            throw new \Exception("{$this->framework_name}{$framework_file_type}.php existing!");
        }
    }

    /**
     * @param $framework_file_type
     */
    public function delete($framework_file_type)
    {
        $file = app_path("{$this->file_path}/{$this->framework_name}{$framework_file_type}.php");
        if (file_exists($file)) {
            unlink($file);
        }
        if ('Controller' === $framework_file_type) {
            $new_directory = base_path("resources/views/{$this->framework_name}");
            exec("rm -rf {$new_directory}");
            $this->deleteRoute();
        }
        usleep(100000);
    }

    private function deleteRoute()
    {
        $route_web_path = base_path('routes/web.php');
        $framework_name_low = strtolower($this->framework_name);
        $route_string = "Route::resource('{$framework_name_low}', '{$this->framework_name}Controller');";
        $file_get_contents = file_get_contents($route_web_path);
        $file_get_contents = str_replace($route_string, '', $file_get_contents);
        file_put_contents($route_web_path, $file_get_contents);
    }

    /**
     * @param $framework_file_type
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function create($framework_file_type): void
    {
        $Storage = Storage::disk('local');
        $body = $Storage->get("tmpl/framework/{$framework_file_type}.php");
        $body = str_replace('Temp', $this->framework_name, $body);
        $framework_name_low = strtolower($this->framework_name);
        $body = str_replace('temp', $framework_name_low, $body);
        $file = app_path("{$this->file_path}/{$this->framework_name}{$framework_file_type}.php");
        if (! is_file($file)) {
            file_put_contents($file, $body);
        }
        if ('Controller' === $framework_file_type) {
            $tmpl_resources_directory = storage_path("app/tmpl/views");
            $resources_directory = base_path("resources/views/{$framework_name_low}");
            exec("cp -r {$tmpl_resources_directory} {$resources_directory}");
            $this->insertRoute($this->framework_name);
            $framework_view_files = scandir($resources_directory);
            foreach ($framework_view_files as $framework_view_file) {
                if (! in_array($framework_view_file, ['.', '..'])) {
                    $route_web_path = $resources_directory . '/' . $framework_view_file;
                    $file_get_contents = file_get_contents($route_web_path);
                    $file_get_contents = str_replace('temp', $framework_name_low, $file_get_contents);
                    file_put_contents($route_web_path, $file_get_contents);
                }
            }
        }
        usleep(100000);
    }

    /**
     *
     */
    private function insertRoute(): void
    {
        $route_web_path = base_path('routes/web.php');
        $framework_name_low = strtolower($this->framework_name);
        $route_string = "Route::resource('{$framework_name_low}', '{$this->framework_name}Controller');";
        file_put_contents($route_web_path, $route_string . PHP_EOL, FILE_APPEND);
    }
}
