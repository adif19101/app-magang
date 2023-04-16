<?php

namespace App\Models;

use CodeIgniter\Model;

class Lowongan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'lowongan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'judul',
        'deskripsi',
        'nama_perusahaan',
        'alamat_perusahaan',
        'tipe_pekerjaan',
        'lama_kontrak',
        'jenis_kontrak',
        'deadline_daftar',
        'kontak_perusahaan',
        'persyaratan',
        'cara_daftar',
        'info_tambahan',
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

    public function createLowongan($data)
    {
        $this->db->transStart();

        $this->insert($data);

        $idLowongan = $this->db->insertID();
        $lowonganSkill = [];
        $skills = explode(",", $data['skill_ids']);
        foreach ($skills as $skill) {
            $lowonganSkill[] = [
                'lowongan_id' => $idLowongan,
                'skill_id' => $skill,
            ];
        }
        $this->db->table('lowongan_skill')->insertBatch($lowonganSkill);

        $this->db->transComplete();

        if ($this->db->transStatus() === false) {
            return false;
        }
        return true;
    }

    public function getLowongan($filter)
    {
        if (isset($filter['search'])) {
            $this->groupStart()
                ->like('judul', $filter['search'])
                ->orLike('nama_perusahaan', $filter['search'])
                ->groupEnd();
        }
        if (isset($filter['jenis_kontrak'])) {
            $this->whereIn('jenis_kontrak', $filter['jenis_kontrak']);
        }
        if (isset($filter['tipe_pekerjaan'])) {
            $this->whereIn('tipe_pekerjaan', $filter['tipe_pekerjaan']);
        }
        $this->orderBy('id', 'DESC');
        return $this->paginate(10);
    }
}
