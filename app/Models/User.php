<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getGroup($id)
    {
        $group =  $this->db->table('auth_groups_users')
        ->select('group')
        ->where('user_id', $id)->get()->getFirstRow('array');
        
        return $group['group'];
    }

    public function showAdmin($id)
    {
        $this->select([
            'users.id',
            'users.username',
            'users.last_active',
            'users.created_at',
            'users.updated_at',
            'auth_identities.secret as email',
            'auth_groups_users.group',
            'admin.nama',
            'admin.avatar',
            'admin.whatsapp',
        ]);

        $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $this->join('auth_identities', 'auth_identities.user_id = users.id', 'left');
        $this->join('admin', 'admin.account_id = users.id', 'left');

        $this->where('users.id', $id);

        return $this->get()->getFirstRow('array');
    }

    public function showMhs($id)
    {
        $this->select([
            'users.id',
            'users.username',
            'users.last_active',
            'users.created_at',
            'users.updated_at',
            'auth_identities.secret as email',
            'auth_groups_users.group',
            'mahasiswa.nama',
            'mahasiswa.npm',
            'mahasiswa.tmpt_tgl_lahir',
            'mahasiswa.alamat',
            'mahasiswa.avatar',
            'mahasiswa.whatsapp',
        ]);

        $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $this->join('auth_identities', 'auth_identities.user_id = users.id', 'left');
        $this->join('mahasiswa', 'mahasiswa.account_id = users.id', 'left');

        $this->where('users.id', $id);

        return $this->get()->getFirstRow('array');
    }

    public function showPerusahaan($id)
    {
        $this->select([
            'users.id',
            'users.username',
            'users.last_active',
            'users.created_at',
            'users.updated_at',
            'auth_identities.secret as email',
            'auth_groups_users.group',
            'perusahaan.nama',
            'perusahaan.alamat',
            'perusahaan.deskripsi',
            'perusahaan.email as email_perusahaan',
            'perusahaan.logo',
            'perusahaan.whatsapp',
        ]);

        $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $this->join('auth_identities', 'auth_identities.user_id = users.id', 'left');
        $this->join('perusahaan', 'perusahaan.account_id = users.id', 'left');

        $this->where('users.id', $id);

        return $this->get()->getFirstRow('array');
    }
}
