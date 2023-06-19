<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatable\DtSuratPlot;

class SuratPlotMhs extends BaseController
{
    public function __construct() {
        $this->mSuratPlot = new \App\Models\SuratPlot();
    }

    public function index()
    {
        $data = [
            'title' => 'Surat Plot Pembimbing',
            'subtitle' => 'Surat Plot Pembimbing',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Surat Plot Pembimbing'
                ],
            ],
        ];

        return view('mahasiswa/suratPlot_mhs', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Pengajuan Surat Plot Pembimbing',
            'subtitle' => 'Pengajuan Surat Plot Pembimbing',
            'breadcrumbs' => [
                [
                    'url' => base_url('mahasiswa'), 
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('mahasiswa/suratPlot'), 
                    'crumb' => 'Surat Plot Pembimbing'
                ],
                [
                    'crumb' => 'Pengajuan Surat Plot Pembimbing'
                ],
            ],
        ];
        return view('mahasiswa/suratPlot_mhs_new', $data);
    }

    public function create()
    {
        $dataIn = $this->request->getPost();

        $suratCovid = $this->request->getFile('surat_covid');
        if ($suratCovid->isValid() && ! $suratCovid->hasMoved()) {
            $suratCovidName = $suratCovid->getRandomName();
            if ($suratCovid->move(SURAT_BUKTI_UPLOAD_PATH, $suratCovidName)) {
                $dataIn += ['surat_covid' => $suratCovidName];
            }
        }

        $suratBalasan = $this->request->getFile('surat_balasan');
        if ($suratBalasan->isValid() && ! $suratBalasan->hasMoved()) {
            $suratBalasanName = $suratBalasan->getRandomName();
            if ($suratBalasan->move(SURAT_BUKTI_UPLOAD_PATH, $suratBalasanName)) {
                $dataIn += ['surat_balasan' => $suratBalasanName];
            }
        }

        $dataIn += [
            'user_id' => auth()->id(),
            'status' => 'PENDING',
        ];
        
        if ($this->mSuratPlot->insert($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Surat Plot Pembimbing berhasil ditambahkan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Surat Plot Pembimbing gagal ditambahkan',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function dt_SuratPlotMhs()
    {
        $dt = new DtSuratPlot();
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
            $row[] = $tb->nama_penanggung_jawab;
            $row[] = convertDate($tb->tanggal_mulai, 'd-m-Y');
            $row[] = convertDate($tb->tanggal_selesai, 'd-m-Y');
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

    public function update($id)
    {
        $dataIn = $this->request->getPost();
        $dataIn += [
            'id' => $id,
        ];

        if ($this->mSuratPlot->save($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Surat Plot berhasil diupdate',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Surat Plot gagal diupdate',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function dtAction($id, $status)
    {
        $button = '<div class="btn-list">
            <a href="'.base_url('mahasiswa/suratPlot/'.$id).'" class="btn btn-primary btn-icon btn-sm" title="Detail" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
            <path d="M12 9h.01"></path>
            <path d="M11 12h1v4h1"></path>
            </svg>
            </a>';

        if ($status == 'DONE') {
            $button .= '<a href="'.base_url('mahasiswa/suratPlot/download/'.$id).'" class="btn btn-success btn-icon btn-sm" title="Download" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
            <path d="M7 11l5 5l5 -5"></path>
            <path d="M12 4l0 12"></path>
            </svg>
            </a>';
        }
        if ($status == 'PENDING' || $status == "APPROVED") {
            $button .= '<a id="'.$id.'" class="btn btn-danger btn-icon btn-sm button-cancel" title="Cancel" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
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
