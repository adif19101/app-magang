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
        'id_perusahaan',
        'tipe_pekerjaan',
        'lama_kontrak',
        'jenis_kontrak',
        'deadline_daftar',
        'kriteria',
        'cara_daftar',
        'info_tambahan',
        'daftar_langsung',
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
        $this->db->transBegin();

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

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function createLowonganPerusahaan($data)
    {
        $this->db->transBegin();

        $id_perusahaan = $this->db->table('perusahaan')
            ->getWhere(['account_id' => auth()->id()], 1)
            ->getRow()->id;

        $data += ['id_perusahaan' => $id_perusahaan];
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

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function getLowongan($filter = null, $perPage = 10)
    {
        $this->select([
            'lowongan.id',
            'lowongan.judul',
            'lowongan.tipe_pekerjaan',
            'lowongan.jenis_kontrak',
            'lowongan.lama_kontrak',
            'perusahaan.nama as nama_perusahaan',
            'perusahaan.avatar as logo_perusahaan',
            'GROUP_CONCAT(skill.nama SEPARATOR \', \') as skills'
        ]);
        $this->join('perusahaan', 'perusahaan.id = lowongan.id_perusahaan', 'left');
        $this->join('lowongan_skill', 'lowongan_skill.lowongan_id = lowongan.id', 'left');
        $this->join('skill', 'skill.id = lowongan_skill.skill_id', 'left');
        $this->groupBy('lowongan.id'); // Group the results by lowongan.id to avoid duplicates
        $this->orderBy('lowongan.id', 'DESC');

        if (isset($filter['search'])) {
            $this->groupStart()
                ->like('judul', $filter['search'])
                ->orLike('perusahaan.nama', $filter['search'])
                ->groupEnd();
        }
        if (isset($filter['jenis_kontrak'])) {
            $this->whereIn('jenis_kontrak', $filter['jenis_kontrak']);
        }
        if (isset($filter['tipe_pekerjaan'])) {
            $this->whereIn('tipe_pekerjaan', $filter['tipe_pekerjaan']);
        }

        return $this->paginate($perPage);
    }

    public function detailLowongan($id)
    {
        $this->select([
            'lowongan.*',
            'users.username',
            'perusahaan.nama as nama_perusahaan',
            'perusahaan.alamat as alamat_perusahaan',
            'perusahaan.email as email_perusahaan',
            'perusahaan.whatsapp as whatsapp_perusahaan',
            'perusahaan.avatar as logo_perusahaan',
            'perusahaan.deskripsi as deskripsi_perusahaan'
        ]);
        $this->join('users', 'users.id = lowongan.user_id');
        $this->join('perusahaan', 'perusahaan.id = lowongan.id_perusahaan');
        $this->where('lowongan.id', $id);
        return $this->first();
    }

    public function detailLowonganPerusahaan($id)
    {
        $this->select([
            'lowongan.*',
        ]);
        $this->where([
            'lowongan.id' => $id,
            'lowongan.user_id' => auth()->id(),
        ]);
        return $this->first();
    }

    public function deleteLowongan($id)
    {
        $this->db->transStart();

        $this->db->table('lowongan_skill')->where('lowongan_id', $id)->delete();
        
        $this->delete($id);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }
}
