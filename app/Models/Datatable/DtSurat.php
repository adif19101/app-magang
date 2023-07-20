<?php

namespace App\Models\Datatable;

use App\Models\DatatableModel;

class DtSurat extends DatatableModel
{
    var $table = 'surat';
    var $column_order = array(null, null, 'nama', 'npm', 'email', 'perusahaan.nama', 'penerima_surat', 'status', 'surat.created_at');
    var $column_search = array('surat.nama', 'surat.email', 'perusahaan.nama', 'surat.penerima_surat', 'surat.status');
    var $order = array('surat.created_at' => 'desc');

    function _select_query()
    {
        $this->select([
            'surat.*',
            'perusahaan.nama as nama_perusahaan',
            // 'users.username'
        ]);

        // $this->from($this->table);

        $this->join('perusahaan', 'surat.id_perusahaan = perusahaan.id');
        // $this->join('users', 'surat.user_id = users.id');
        
        if (auth()->user()->getGroups()[0] == 'mahasiswa') {
            $this->where('surat.user_id', auth()->id());
        } else {
            $this->where('surat.status !=', 'CANCELED');
        }
    }

    function _custom_search_query()
    {
    }
}
