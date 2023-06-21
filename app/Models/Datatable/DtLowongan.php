<?php

namespace App\Models\Datatable;

use App\Models\DatatableModel;

class DtLowongan extends DatatableModel
{
    var $table = 'lowongan';
    var $column_order = [
        null,
        null,
        'lowongan.judul',
        'perusahaan.nama',
        'lowongan.deadline_daftar',
        'lowongan.tipe_pekerjaan',
        'lowongan.lama_kontrak',
        'lowongan.jenis_kontrak',
        'lowongan.updated_at'
    ];
    var $column_search = [
        'lowongan.judul',
        'perusahaan.nama',
        'lowongan.deadline_daftar',
        'lowongan.tipe_pekerjaan',
        'lowongan.lama_kontrak',
        'lowongan.jenis_kontrak',
    ];
    var $order = array('lowongan.updated_at' => 'desc');

    function _select_query()
    {
        $this->select([
            'lowongan.*',
            'perusahaan.nama as nama_perusahaan',
        ]);

        // $this->from($this->table);

        $this->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id', 'left');

        if (auth()->user()->getGroups()[0] != 'admin') {
            $this->where('lowongan.user_id', auth()->id());
        }
    }

    function _custom_search_query()
    {
    }
}
