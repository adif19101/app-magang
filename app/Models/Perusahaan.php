<?php

namespace App\Models;

use CodeIgniter\Model;

class Perusahaan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'perusahaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'alamat',
        'deskripsi',
        'email',
        'whatsapp',
        'avatar',
        'account_id'
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

    public function getPerusahaan($searchTerm = null, $where = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        if ($searchTerm) {
            $builder->like('nama', $searchTerm);
        }
        if ($where) {
            $builder->where($where);
        }
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function deleteAvaImg($id)
    {
        $this->db->transBegin();

        $this->where('account_id', $id);
        $this->set(['avatar' => null]);
        $this->update();
        
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function saveProfile($data)
    {
        $oldAvatar = $this->select('avatar')->where('account_id', auth()->id())->first()['avatar'];

        $this->db->transBegin();
        $save = $this->whereIn('account_id', [auth()->id()])
            ->set($data)
            ->update();

        if (!$save) {
            $this->db->transRollback();
            if (isset($data['avatar']) && $data['avatar'] != null) {
                unlink(AVATAR_UPLOAD_PATH . '/' . $data['avatar']);
            }
            return false;
        }

        $this->db->transCommit();
        if ($oldAvatar != null && isset($data['avatar']) && $data['avatar'] != null) {
            unlink(AVATAR_UPLOAD_PATH . '/' . $oldAvatar);
        }

        $this->db->transComplete();
        return true;
    }
}
