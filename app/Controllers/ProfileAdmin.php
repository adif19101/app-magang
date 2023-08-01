<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileAdmin extends BaseController
{
    public function __construct() {
        $this->mAdmin = new \App\Models\Admin();
    }
    public function index()
    {
        $data = [
            'title' => 'Profile - Admin',
            'subtitle' => 'Profile',
            // 'breadcrumbs' => [
            //     [
            //         'crumb' => 'Dashboard'
            //     ],
            // ],
        ];

        $data['admin'] = $this->mAdmin
            ->select('admin.*')
            ->where('account_id', auth()->id())
            ->first();
        $data['admin'] += [
            'account_email' => auth()->user()->email,
            'account_username' => auth()->user()->username,
        ];

        return view('admin/admin_profile', $data);
    }

    public function deleteImage()
    {
        $accountId = auth()->id();

        if ($this->mAdmin->deleteAvaImg($accountId)) {
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

        if ($this->mAdmin->saveProfile($dataIn)) {
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
