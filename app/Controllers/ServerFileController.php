<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ServerFileController extends BaseController
{
    public function index()
    {
        //
    }

    public function avatar($filename)
    {
        $path = WRITEPATH . 'uploads/avatar/' . $filename;

        if (file_exists($path) && is_readable($path)) {
            $mimeType = mime_content_type($path);
            header('Content-Type: ' . $mimeType);
            readfile($path);
            exit();
        }
    }

    public function suratBukti($filename)
    {
        $path = SURAT_BUKTI_UPLOAD_PATH . '/' . $filename;

        if (file_exists($path) && is_readable($path)) {
            $mimeType = mime_content_type($path);
            header('Content-Type: ' . $mimeType);
            readfile($path);
            exit();
        }
    }

    public function suratFinal($filename)
    {
        $path = SURAT_FINAL_UPLOAD_PATH . '/' . $filename;

        if (file_exists($path) && is_readable($path)) {
            $mimeType = mime_content_type($path);
            header('Content-Type: ' . $mimeType);
            readfile($path);
            exit();
        }
    }
}
