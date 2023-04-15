<?php

namespace App\Models;

use CodeIgniter\Model;

class Skill extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'skill';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama'        => 'required|is_unique[skill.nama]|max_length[100]',
    ];
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

    public function getSkills($searchTerm = null)
    {
        $builder = $this->db->table('skill');
        $builder->select('id, nama as text');
        if ($searchTerm) {
            $builder->like('nama', $searchTerm);
        }
        $query = $builder->get();

        return $query->getResultArray();
    }
}
