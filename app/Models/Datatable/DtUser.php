<?php

namespace App\Models\Datatable;

use App\Models\DatatableModel;

class DtUser extends DatatableModel
{
    var $table = 'users';
    var $column_order = [
        null,
        null,
        null,
        'auth_identities.secret',
        'users.username',
        'auth_groups_users.group',
        'users.created_at'
    ];
    var $column_search = [
        'users.username',
        'perusahaan.nama',
        'mahasiswa.nama',
        'admin.nama',
        'auth_identities.secret',
    ];
    var $order = array('users.created_at' => 'desc');

    function _select_query()
    {
        $this->select([
            'users.id',
            'COALESCE(perusahaan.nama, mahasiswa.nama, admin.nama) as nama_user',
            'auth_identities.secret',
            'users.username',
            'auth_groups_users.group',
            'users.created_at'
        ]);

        $this->join('auth_identities', 'users.id = auth_identities.user_id', 'left');
        $this->join('auth_groups_users', 'users.id = auth_groups_users.user_id', 'left');
        $this->join('mahasiswa', 'users.id = mahasiswa.account_id', 'left');
        $this->join('admin', 'users.id = admin.account_id', 'left');
        $this->join('perusahaan', 'users.id = perusahaan.account_id', 'left');

    }

    function _custom_search_query()
    {
    }
}
