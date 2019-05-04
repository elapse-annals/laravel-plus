<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class FrameworkController extends Controller
{
    //
    public function createFile($framework, $framework_name)
    {
        switch ($framework) {
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
        $Storage = Storage::disk('local');
        $body = $Storage->get("framework_temp/{$framework}.php");
        $body = str_replace('Test', $framework_name, $body);
        $Storage->put("../../app/{$file_path}/{$framework_name}{$framework}.php", $body);
        usleep(200000);
    }
}
