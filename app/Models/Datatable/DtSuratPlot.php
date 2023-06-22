<?php

namespace App\Models\Datatable;

use App\Models\DatatableModel;

class DtSuratPlot extends DatatableModel
{
    var $table = 'surat_plot';
    var $column_order = array(null, null, 'nama', 'npm', 'email', 'nama_perusahaan', 'nama_penanggung_jawab', 'tanggal_mulai', 'tanggal_selesai', 'status', 'created_at');
    var $column_search = array('nama', 'npm', 'email', 'nama_perusahaan', 'nama_penanggung_jawab', 'status');
    var $order = array('created_at' => 'desc');

    function _select_query()
    {
        $this->select([
            'surat_plot.*',
            // 'users.username'
        ]);

        // $this->from($this->table);

        // $this->join('users', 'user_id = users.id');
        
        if (auth()->user()->getGroups()[0] == 'user') {
            $this->where('surat_plot.user_id', auth()->id());
        }
    }

    function _custom_search_query()
    {
    }
}
