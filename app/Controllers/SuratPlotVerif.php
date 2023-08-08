<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Datatable\DtSuratPlot;
use CodeIgniter\Files\File;

class SuratPlotVerif extends BaseController
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
                    'url' => base_url('verifikator'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'crumb' => 'Surat Plot Pembimbing'
                ],
            ],
        ];

        return view('verifikator/suratPlot_verif', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail Surat Plot Pembimbing',
            'subtitle' => 'Detail Surat Plot Pembimbing',
            'breadcrumbs' => [
                [
                    'url' => base_url('verifikator'),
                    'crumb' => 'Dashboard'
                ],
                [
                    'url' => base_url('verifikator/suratPlot'),
                    'crumb' => 'Surat Plot Pembimbing'
                ],
                [
                    'crumb' => 'Detail'
                ],
            ],
            'surat' => $this->mSuratPlot->find($id),
        ];

        return view('verifikator/suratPlot_verif_show', $data);
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

        if ($this->mSuratPlot->save($dataIn)) {
            $response = [
                'status' => 'success',
                'message' => 'Surat Plot Pembimbing berhasil diupdate',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Surat Plot Pembimbing gagal diupdate',
            ];
        }

        return $this->response->setJSON($response);
    }

    public function download($id)
    {
        $surat = $this->mSuratPlot->downloadFilename($id);
        $filepath = SURAT_FINAL_UPLOAD_PATH . '/' . $surat['surat_final'];
        $file = new File($filepath);

        return $this->response->download($filepath, null)
            ->setFileName("PLOT_PEMBIMBING_" . $surat['npm'] . "_" . $surat['nama_perusahaan']. '.' . $file->guessExtension());
    }

    public function dt_SuratPlotVerif()
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

    public function dtAction($id, $status)
    {
        $button = '<div class="btn-list">
            <a href="' . base_url('verifikator/suratPlot/' . $id) . '" class="btn btn-primary btn-icon btn-sm" title="Detail" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
            <path d="M12 9h.01"></path>
            <path d="M11 12h1v4h1"></path>
            </svg>
            </a>';

        if ($status == 'DONE') {
            $button .= '<a href="' . base_url('verifikator/suratPlot/download/' . $id) . '" class="btn btn-success btn-icon btn-sm" title="Download" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
            <path d="M7 11l5 5l5 -5"></path>
            <path d="M12 4l0 12"></path>
            </svg>
            </a>';
        }
        if ($status == 'PENDING') {
            $button .= '<a data-status="APPROVED" id="' . $id . '" class="btn btn-info btn-icon btn-sm button-status" title="Approve" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 12l5 5l10 -10"></path>
            </svg>
        </a>';

            $button .= '<a data-status="REJECTED" id="' . $id . '" class="btn btn-danger btn-icon btn-sm button-status" title="Reject" aria-label="Button" data-bs-toggle="tooltip" data-bs-placement="right">
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
