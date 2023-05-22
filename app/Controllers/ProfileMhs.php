<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileMhs extends BaseController
{
    public function index()
    {
        //
    }

    public function deleteImage()
    {
        // TODO fix this
        if ($this->mLowongan->createLowongan($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Lowongan berhasil ditambahkan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Lowongan gagal ditambahkan',
            ];
        }

        return $this->response->setJSON($response);
    }
}
