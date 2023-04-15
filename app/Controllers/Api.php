<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->mSkill = new \App\Models\Skill();
    }

    public function select2Skill()
    {
        $search = $this->request->getVar('search');

        $result = $this->mSkill->getSkills($search);

        return $this->respond($result);
    }

    public function createselect2Skill()
    {
        $nama = $this->request->getPost('nama');

        if ($this->mSkill->insert(['nama' => $nama])) {
            $response = [
                'status' => 'success',
                'message' => 'Kemampuan berhasil ditambahkan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Kemampuan gagal ditambahkan',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function tesApi()
    {
        
    }
}
