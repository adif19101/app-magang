<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa;

class ProfileMhs extends BaseController
{
    public function __construct() {
        $this->mMahasiswa = new Mahasiswa();
    }

    public function index()
    {
        //
    }

    public function deleteImage()
    {
        // TODO fix this
        $accountId = auth()->id();

        if ($this->mMahasiswa->deleteAvaImg($accountId)) {
            $response = [
                'status' => 'success',
                'message' => 'Foto profil berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Foto profil gagal dihapus',
            ];
        }

        return $this->response->setJSON($response);
    }
}
