<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratPlot extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'surat_plot';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'nama',
        'npm',
        'email',
        'surat_covid',
        'surat_balasan',
        'nama_perusahaan',
        'alamat_perusahaan',
        'nama_penanggung_jawab',
        'hp_penanggung_jawab',
        'latitude',
        'longitude',
        'tanggal_mulai',
        'tanggal_selesai',
        'bidang_minat',
        'rencana_magang',
        'status',
        'surat_final'
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

    public function downloadFilename($id)
    {
        $this->select([
            'npm',
            'surat_final',
            'nama_perusahaan',
        ]);

        $this->where('id', $id);

        return $this->first();
    }
}
