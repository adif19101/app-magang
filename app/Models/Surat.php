<?php

namespace App\Models;

use CodeIgniter\Model;

class Surat extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'surat';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_perusahaan',
        'user_id',
        'nama',
        'npm',
        'tmpt_tgl_lahir',
        'email',
        'agama',
        'no_hp',
        'alamat',
        'penerima_surat',
        'status',
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

    public function createSurat($data)
    {
        $this->db->transStart();

        if ($data['id_perusahaan'] == 0 || $data['id_perusahaan'] == null) {
            $perusahaan = [
                'nama' => $data['nama_perusahaan'],
                'alamat' => $data['alamat_perusahaan'],
                'email' => $data['email_perusahaan'],
                'whatsapp' => $data['whatsapp_perusahaan'],
                'deskripsi' => $data['deskripsi_perusahaan'],
            ];
            $this->db->table('perusahaan')->insert($perusahaan);
            $data['id_perusahaan'] = $this->db->insertID();
        }

        $this->insert($data);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return false;
        }
        return true;
    }
}