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
}
