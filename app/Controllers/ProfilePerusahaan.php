<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfilePerusahaan extends BaseController
{
    public function __construct() {
        $this->mPerusahaan = new \App\Models\Perusahaan();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile - Perusahaan',
            'subtitle' => 'Profile',
            // 'breadcrumbs' => [
            //     [
            //         'crumb' => 'Dashboard'
            //     ],
            // ],
        ];

        $data['perusahaan'] = $this->mPerusahaan
            ->select('perusahaan.*')
            ->where('account_id', auth()->id())
            ->first();
        $data['perusahaan'] += [
            'account_email' => auth()->user()->email,
            'account_username' => auth()->user()->username,
        ];

        return view('perusahaan/perusahaan_profile', $data);
    }

    public function deleteImage()
    {
        $accountId = auth()->id();

        if ($this->mPerusahaan->deleteAvaImg($accountId)) {
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

        setUserSession();
        return $this->response->setJSON($response);
    }

    public function saveProfile()
    {
        $dataIn = $this->request->getPost();

        $img = $this->request->getFile('avatar_upload');

        if (isset($img) && $img->isValid() && ! $img->hasMoved()) {
            $imgName = $img->getRandomName();

            if ($img->move(AVATAR_UPLOAD_PATH, $imgName)) {
                $dataIn += ['avatar' => $imgName];
            }
        }

        if ($this->mPerusahaan->saveProfile($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Profile berhasil disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Profile gagal disimpan',
            ];
        }

        setUserSession();
        return $this->response->setJSON($response);
    }

    public function saveDetail()
    {
        $users = auth()->getProvider();

        $user = $users->findById(auth()->id());

        $data = array_filter($this->request->getPost(), 'strlen');
        $user->fill($data);
        
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
