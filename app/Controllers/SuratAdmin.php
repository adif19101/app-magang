<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatable\DtSurat;
use App\Models\Surat;
use CodeIgniter\Files\File;

class SuratAdmin extends BaseController
{
    public function __construct()
    {
        $this->mSurat = new Surat();
    }

    public function index()
    {
        $data = [
            'title' => 'Surat Permohonan Magang',
            'subtitle' => 'Surat Permohonan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Surat Permohonan Magang'
                ],
            ],
        ];

        return view('admin/surat_admin', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Surat Permohonan Magang',
            'subtitle' => 'Detail Surat Permohonan Magang',
            'breadcrumbs' => [
                [
                    'url' => base_url('admin'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('admin/surat'),
                    'crumb' => 'Surat Permohonan Magang'
                ],
                [
                    'crumb' => 'Detail'
                ],
            ],
            'surat' => $this->mSurat->showSurat($id),
        ];

        return view('admin/surat_admin_show', $data);
    }

    public function update($id)
    {
        $dataIn = $this->request->getPost();
        $dataIn += [
            'id' => $id,
        ];

        $suratFinal = $this->request->getFile('surat_final');
        if (isset($suratFinal) && $suratFinal->isValid() && !$suratFinal->hasMoved()) {
            $suratFinalName = $suratFinal->getRandomName();
            if ($suratFinal->move(SURAT_FINAL_UPLOAD_PATH, $suratFinalName)) {
                $dataIn += ['surat_final' => $suratFinalName];
            }
        }

        if ($this->mSurat->save($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Surat Permohonan Magang berhasil diupdate',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Surat Permohonan Magang gagal diupdate',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function download($id)
    {
        $surat = $this->mSurat->downloadFilename($id);
        $filepath = SURAT_FINAL_UPLOAD_PATH . '/' . $surat['surat_final'];
        $file = new File($filepath);

        return $this->response->download($filepath, null)
            ->setFileName("PERMOHONAN_MAGANG_" . $surat['npm'] . "_" . $surat['nama_perusahaan']. '.' . $file->guessExtension());
    }

    public function dt_SuratAdmin()
    {
        $dt = new DtSurat();
        $data = [];
        $no = $this->request->getPost('start');

        foreach ($dt->get_datatables() as $tb) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $this->dtAction($tb->id, $tb->status);
            $row[] = $tb->nama;
            $row[] = $tb->npm;
            $row[] = $tb->email;
            $row[] = $tb->nama_perusahaan;
            $row[] = $tb->penerima_surat;
            $row[] = statusBadge($tb->status);
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

    public function dtAction($id, $status)
    {
        $button = '<div class="btn-list">
            <a href="' . base_url('admin/surat/' . $id) . '" class="btn btn-primary btn-icon btn-sm" title="Detail" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
            <path d="M12 9h.01"></path>
            <path d="M11 12h1v4h1"></path>
            </svg>
            </a>';

        if ($status == 'DONE') {
            $button .= '<a href="' . base_url('admin/surat/download/' . $id) . '" class="btn btn-success btn-icon btn-sm" title="Download" target="_blank" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
            <path d="M7 11l5 5l5 -5"></path>
            <path d="M12 4l0 12"></path>
            </svg>
            </a>';
        }
        if ($status == 'PENDING' || $status == "APPROVED") {
            $button .= '<a id="' . $id . '" class="btn btn-danger btn-icon btn-sm button-reject" title="Reject" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 7l16 0"></path>
            <path d="M10 11l0 6"></path>
            <path d="M14 11l0 6"></path>
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
            </svg>
        </a>';
        }

        return $button .= '</div>';
    }
}
