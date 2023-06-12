<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AvatarController extends BaseController
{
    public function index()
    {
        //
    }

    public function show($filename)
    {
        $path = WRITEPATH . 'uploads/avatar/' . $filename;

        if (file_exists($path) && is_readable($path)) {
            $mimeType = mime_content_type($path);
            header('Content-Type: ' . $mimeType);
            readfile($path);
            exit();
        }
    }
}
