<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa;

class ProfileMhs extends BaseController
{
    public function __construct() {
        $this->mMahasiswa = new Mahasiswa();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile - Mahasiswa',
            'subtitle' => 'Profile',
            // 'breadcrumbs' => [
            //     [
            //         'crumb' => 'Dashboard'
            //     ],
            // ],
        ];

        $data['mahasiswa'] = $this->mMahasiswa
            ->select('mahasiswa.*')
            ->where('account_id', auth()->id())
            ->first();
        $data['mahasiswa']['avatar'] = urlImg($data['mahasiswa']['avatar']);
        $data['mahasiswa'] += [
            'email' => auth()->user()->email,
            'username' => auth()->user()->username,
        ];

        return view('mahasiswa/mhs_profile', $data);
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

    public function saveProfile()
    {
        
    }

    public function saveDetail()
    {
        $users = auth()->getProvider();

        $user = $users->findById(auth()->id());
        $user->fill($this->request->getPost());
        
        if ($users->save($user)) {
            auth()->logout();
            $response = [
                'status' => 'success',
                'message' => 'Detail akun berhasil disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Detail akun gagal disimpan',
            ];
        }

        return $this->response->setJSON($response);
    }
}
