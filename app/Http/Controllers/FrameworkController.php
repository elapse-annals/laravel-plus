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
     * @param $framework
     * @param $framework_name
     *
     * @return array
     */
    public function init($framework, $framework_name): array
    {
        $framework_name = ucfirst($framework_name);
        switch ($framework) {
            case 'Controller':
                $file_path = 'Http/Controllers';
                break;
            case 'Repository':
                $file_path = 'Repositories';
                break;
            case 'Service':
            case 'Presenter':
            case 'Transformer':
            case 'Formatter':
                $file_path = $framework . 's';
                break;
        }
        return [$framework_name, $file_path];
    }

    //

    /**
     * @param $framework
     * @param $framework_name
     * @param $is_delete
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle($framework, $framework_name, $is_delete)
    {
        if ($is_delete) {
            $this->delete($framework, $framework_name);
        } else {
            $this->create($framework, $framework_name);
        }
    }

    /**
     * @param $framework
     * @param $framework_name
     */
    public function delete($framework, $framework_name)
    {
        [$framework_name, $file_path] = $this->init($framework, $framework_name);
        $file = app_path("{$file_path}/{$framework_name}{$framework}.php");
        if (file_exists($file)) {
            unlink($file);
        }
        if ('Controller' === $framework) {
            $new_directory = base_path("resources/views/{$framework_name}");
            exec("rm -rf {$new_directory}");
        }
        usleep(300000);
    }

    /**
     * @param $framework
     * @param $framework_name
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function create($framework, $framework_name): void
    {
        [$framework_name, $file_path] = $this->init($framework, $framework_name);
        $Storage = Storage::disk('local');
        $body = $Storage->get("tmpl/framework/{$framework}.php");
        $body = str_replace('Temp', $framework_name, $body);
        $file = app_path("{$file_path}/{$framework_name}{$framework}.php");
        if (!is_file($file)) {
            file_put_contents($file, $body);
        }
        if ('Controller' === $framework) {
            $old_directory = storage_path("app/tmpl/views");
            $new_directory = base_path("resources/views/{$framework_name}");
            exec("cp -r {$old_directory} {$new_directory}");
        }
        usleep(300000);
    }
}
