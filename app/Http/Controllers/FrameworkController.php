<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    //
    public function createFile($framework, $framework_name)
    {
        switch ($framework) {
            case 'Repository':
                $file_name = 'Repositories';
                break;
            case 'Service':
            case 'Presenter':
            case 'Transformer':
            case 'Formatter':
                $file_name = $framework . 's';
                break;
        }
        usleep(200000);
    }
}
