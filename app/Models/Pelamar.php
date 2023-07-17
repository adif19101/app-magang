<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelamar extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pelamar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'id_lowongan',
        'cv',
        'dokumen_pendukung',
    ];

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

    public function detailPelamar($idPelamar)
    {
        $this->select([
            'pelamar.*',
            'mahasiswa.nama',
            'mahasiswa.tmpt_tgl_lahir',
            'mahasiswa.alamat',
            'mahasiswa.whatsapp',
            'auth_identities.secret as email',
        ]);

        $this->join('mahasiswa', 'pelamar.user_id = mahasiswa.account_id', 'left');
        $this->join('auth_identities', 'pelamar.user_id = auth_identities.user_id', 'left');

        $this->where([
            'pelamar.id' => $idPelamar,
        ]);

        return $this->first();
    }
}
