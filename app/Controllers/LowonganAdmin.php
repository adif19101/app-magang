<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatable\DtLowongan;
use App\Models\Lowongan;

class LowonganAdmin extends BaseController
{
    public function __construct() {
        $this->mLowongan = new Lowongan();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Lowongan Magang',
            'subtitle' => 'Lowongan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Lowongan'
                ],
            ],
        ];

        return view('admin/lowongan_admin', $data);
    }

    public function delete($id)
    {
        if ($this->mLowongan->delete($id)) {
            $response = [
                'status' => 'success',
                'message' => 'Lowongan Magang berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Lowongan Magang gagal dihapus',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function dt_lowongan()
    {
        $dt = new DtLowongan();
        $data = [];
        $no = $this->request->getPost('start');

        foreach ($dt->get_datatables() as $tb) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $this->dtAction($tb->id);
            $row[] = $tb->judul;
            $row[] = $tb->nama_perusahaan;
            $row[] = convertDate($tb->deadline_daftar, 'd-m-Y');
            $row[] = $tb->tipe_pekerjaan;
            $row[] = $tb->lama_kontrak;
            $row[] = $tb->jenis_kontrak;
            $row[] = convertDate($tb->updated_at, 'd-m-Y');

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
            <a href="' . base_url('admin/lowongan/' . $id) . '" class="btn btn-primary btn-icon btn-sm" title="Detail" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
            <path d="M12 9h.01"></path>
            <path d="M11 12h1v4h1"></path>
            </svg>
            </a>';

        $button .= '<a href="' . base_url('admin/lowongan/' . $id . '/edit') . '" class="btn btn-warning btn-icon btn-sm" title="Edit" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
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
