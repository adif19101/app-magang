<?php

namespace App\Models\Datatable;

use App\Models\DatatableModel;

class DtSurat extends DatatableModel
{
    var $table = 'surat';
    var $column_order = array(null, null, 'nama', 'npm', 'email', 'no_hp', 'penerima_surat', 'status');
    var $column_search = array('surat.nama', 'surat.email', 'surat.no_hp', 'surat.penerima_surat', 'surat.status');
    var $order = array('surat.updated_at' => 'desc');

    function _select_query()
    {
        $this->select([
            'surat.*',
            'perusahaan.nama as nama_perusahaan',
            'users.username'
        ]);

        // $this->from($this->table);

        $this->join('perusahaan', 'surat.id_perusahaan = perusahaan.id');
        $this->join('users', 'surat.user_id = users.id');
        
        if (auth()->user()->getGroups()[0] == 'user') {
            $this->where('surat.user_id', auth()->id());
        }
    }

    function _custom_search_query()
    {
    }
}
