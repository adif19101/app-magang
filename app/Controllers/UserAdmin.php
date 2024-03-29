<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatable\DtUser;
use App\Models\User;

class UserAdmin extends BaseController
{
    public function __construct()
    {
        $this->mUser = new User();
        $this->mMahasiswa = new \App\Models\Mahasiswa();
        $this->mPerusahaan = new \App\Models\Perusahaan();
        $this->mAdmin = new \App\Models\Admin();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola User',
            'subtitle' => 'Kelola User',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Kelola User'
                ],
            ],
        ];

        return view('admin/user_admin', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail User',
            'subtitle' => 'Detail User',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('admin/user'),
                    'crumb' => 'Kelola User'
                ],
                [
                    'crumb' => 'Detail'
                ],
            ],
        ];

        $userGroup = $this->mUser->getGroup($id);

        switch ($userGroup) {
            case 'mahasiswa':
                $data['user'] = $this->mUser->showMhs($id);
                return view('admin/user_mhs_show', $data);
                break;

            case 'perusahaan':
                $data['user'] = $this->mUser->showPerusahaan($id);
                return view('admin/user_perusahaan_show', $data);
                break;

            default:
                $data['user'] = $this->mUser->showAdmin($id);
                return view('admin/user_admin_show', $data);
                break;
        }
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah User',
            'subtitle' => 'Tambah User',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('admin/user'),
                    'crumb' => 'Kelola User'
                ],
                [
                    'crumb' => 'Tambah'
                ],
            ],
        ];

        return view('admin/user_admin_new', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'subtitle' => 'Edit User',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('admin/user'),
                    'crumb' => 'Kelola User'
                ],
                [
                    'crumb' => 'Edit'
                ],
            ],
        ];

        $userGroup = $this->mUser->getGroup($id);

        switch ($userGroup) {
            case 'mahasiswa':
                $data['user'] = $this->mUser->showMhs($id);
                return view('admin/user_mhs_edit', $data);
                break;

            case 'perusahaan':
                $data['user'] = $this->mUser->showPerusahaan($id);
                return view('admin/user_perusahaan_edit', $data);
                break;

            default:
                $data['user'] = $this->mUser->showAdmin($id);
                return view('admin/user_admin_edit', $data);
                break;
        }
    }

    public function create()
    {
        $dataIn = $this->request->getPost();

        switch ($dataIn['group']) {
            case 'mahasiswa':
                if ($this->mUser->insertMhs($dataIn)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Akun mahasiswa berhasil ditambahkan',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Akun mahasiswa gagal ditambahkan',
                    ];
                }
                break;

            case 'perusahaan':
                $avatar = $this->request->getFile('avatar_upload');
                if (isset($avatar) && $avatar->isValid() && !$avatar->hasMoved()) {
                    $avatarName = $avatar->getRandomName();
                    if ($avatar->move(AVATAR_UPLOAD_PATH, $avatarName)) {
                        $dataIn += ['avatar' => $avatarName];
                    }
                } else {
                    $dataIn += ['avatar' => null];
                }

                if ($this->mUser->insertPerusahaan($dataIn)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Akun perusahaan berhasil ditambahkan',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Akun perusahaan gagal ditambahkan',
                    ];
                }
                break;

            case 'perusahaan-terdaftar':
                if ($this->mUser->createAccPerusahaan($dataIn)) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Akun perusahaan berhasil ditambahkan',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Akun perusahaan gagal ditambahkan',
                    ];
                }
                break;

            case 'admin':
                if ($this->mUser->insertAdmin($dataIn, 'admin')) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Akun admin berhasil ditambahkan',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Akun admin gagal ditambahkan',
                    ];
                }
                break;

            case 'verifikator':
                if ($this->mUser->insertAdmin($dataIn, 'verifikator')) {
                    $response = [
                        'status' => 'success',
                        'message' => 'Akun verifikator berhasil ditambahkan',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Akun verifikator gagal ditambahkan',
                    ];
                }
                break;

            default:
                $response = [
                    'status' => 'error',
                    'message' => 'Akun gagal ditambahkan',
                ];
                break;
        }

        return $this->response->setJSON($response);
    }

    public function update($id)
    {
        $dataIn = $this->request->getPost();
        $dataIn += ['account_id' => $id];

        $img = $this->request->getFile('avatar_upload');

        if (isset($img) && $img->isValid() && !$img->hasMoved()) {
            $imgName = $img->getRandomName();

            if ($img->move(AVATAR_UPLOAD_PATH, $imgName)) {
                $dataIn += ['avatar' => $imgName];
            }
        }

        if ($this->mUser->updateUser($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Akun berhasil diupdate',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Akun gagal diupdate',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function deleteImage()
    {
        $id = $this->request->getPost('id');
        $group = $this->request->getPost('group');

        switch ($group) {
            case 'mahasiswa':
                if ($this->mMahasiswa->deleteAvaImg($id)) {
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
                break;

            case 'perusahaan':
                if ($this->mPerusahaan->deleteAvaImg($id)) {
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
                break;

            case 'admin':
                if ($this->mAdmin->deleteAvaImg($id)) {
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
                break;

            default:
                $response = [
                    'status' => 'error',
                    'message' => 'Foto profil gagal dihapus',
                ];
                break;
        }

        return $this->response->setJSON($response);
    }

    public function delete($id)
    {
        if ($this->mUser->deleteUser($id)) {
            $response = [
                'status' => 'success',
                'message' => 'User berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'User gagal dihapus',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function datatable()
    {
        $dt = new DtUser();
        $data = [];
        $no = $this->request->getPost('start');

        foreach ($dt->get_datatables() as $tb) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $this->dtAction($tb->id);
            $row[] = $tb->nama_user;
            $row[] = $tb->secret;
            $row[] = $tb->username;
            $row[] = $tb->group;
            $row[] = convertDate($tb->created_at, 'd-m-Y');

            $data[] = $row;
        }

        $output = [
            'draw' => $this->request->getPost('draw'),
            'recordsTotal' => $dt->count_all(),
            'recordsFiltered' => $dt->count_filtered(),
            'data' => $data,
        ];

        return $this->response->setJSON($output);
    }

    public function dtAction($id)
    {
        $button = '<div class="btn-list">
        <a href="' . base_url('admin/user/' . $id) . '" class="btn btn-primary btn-icon btn-sm" title="Detail" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
        <path d="M12 9h.01"></path>
        <path d="M11 12h1v4h1"></path>
        </svg>
        </a>';

        $button .= '<a href="' . base_url('admin/user/' . $id . '/edit') . '" class="btn btn-warning btn-icon btn-sm" title="Edit" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
        <path d="M13.5 6.5l4 4"></path>
        </svg>
        </a>';

        $button .= '<a id="' . $id . '" class="btn btn-danger btn-icon btn-sm button-delete" title="Delete" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M4 7l16 0"></path>
        <path d="M10 11l0 6"></path>
        <path d="M14 11l0 6"></path>
        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
        </svg>
        </a>';

        return $button .= '</div>';
    }
}
