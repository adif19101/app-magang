<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatable\DtSurat;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Shield\Entities\User;

class Api extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->mSkill = new \App\Models\Skill();
        $this->mPerusahaan = new \App\Models\Perusahaan();
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
                'last_id' => $this->mSkill->getInsertID(),
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Kemampuan gagal ditambahkan',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function searchPerusahaan()
    {
        $search = $this->request->getPost('cari_perusahaan');

        $data = $this->mPerusahaan->getPerusahaan($search);

        if (!$data) {
            $response = '<div class="container text-center"><span><span class="status status-red">Perusahaan tidak ditemukan.</span> Silahkan tambahkan perusahaan baru.</span></div>';

            return $this->respond($response);
        }

        $result = '<div class="row row-cards">';

        foreach ($data as $key) {
            $result = $result . '<div class="col-sm-12 col-lg-6"><div class="card card-sm"><div class="card-body"><div class="d-flex align-items-center mb-3">'
                . '<span class="avatar me-3 rounded" style="background-image: url(' . showAvatar($key['avatar']) . '"></span>'
                . '<div><div id="compName">' . $key['nama'] . '</div></div></div>';

            if ($key['whatsapp']) {
                $result = $result . '<div id="compWhatsapp" class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path><path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1"></path></svg>'
                    . $key['whatsapp'] . '</div>';
            }

            if ($key['email']) {
                $result = $result . '<div id="compEmail" class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path><path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path></svg>'
                    . $key['email'] . '</div>';
            }

            $result = $result . '<p id="compDeskripsi">' . $key['deskripsi'] . '</p>' . '<p hidden id="compAlamat">' . $key['alamat'] . '</p>';
            // TODO tambahin button untuk apply
            $result = $result . '<button id="' . $key['id'] . '"class="btn btn-primary btn-sm" onclick="pilihPerusahaan(this)">Pilih</button></div></div></div>';
        }

        $result = $result . '</div>';

        return $this->respond($result);
    }

    public function searchDataPerusahaan()
    {
        $search = $this->request->getPost('cari_perusahaan');

        $data = $this->mPerusahaan->getPerusahaan($search, $where = ['account_id' => null]);

        if (!$data) {
            $response = [
                'status' => 'error',
                'message' => 'Perusahaan tidak ditemukan',
            ];

            return $this->respond($response);
        }

        $response = [
            'status' => 'success',
            'message' => 'Perusahaan ditemukan',
            'data' => $data,
        ];

        return $this->respond($response);
    }
}
