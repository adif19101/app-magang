<?php

namespace App\Models\Datatable;

use App\Models\DatatableModel;

class DtPelamar extends DatatableModel
{
    function __construct($idLowongan) {
        $this->idLowongan = $idLowongan;
    }

    var $table = 'pelamar';
    var $column_order = [
        null,
        null,
        'mahasiswa.nama',
        'auth_identities.secret',
        'mahasiswa.whatsapp',
        'pelamar.created_at',
    ];
    var $column_search = [
        'mahasiswa.nama',
        'auth_identities.secret',
        'mahasiswa.whatsapp',
    ];
    var $order = array('pelamar.created_at' => 'desc');

    function _select_query()
    {
        $this->select([
            'pelamar.id',
            'mahasiswa.nama',
            'auth_identities.secret as email',
            'mahasiswa.whatsapp',
            'pelamar.created_at',
        ]);

        $this->join('mahasiswa', 'pelamar.user_id = mahasiswa.account_id', 'left');
        $this->join('auth_identities', 'pelamar.user_id = auth_identities.user_id', 'left');

        $this->where([
            'pelamar.id_lowongan' => $this->idLowongan,
        ]);
    }

    function _custom_search_query()
    {
    }
}
