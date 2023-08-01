<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Entities\User as EntitiesUser;

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
            'perusahaan.avatar',
            'perusahaan.whatsapp',
        ]);

        $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $this->join('auth_identities', 'auth_identities.user_id = users.id', 'left');
        $this->join('perusahaan', 'perusahaan.account_id = users.id', 'left');

        $this->where('users.id', $id);

        return $this->get()->getFirstRow('array');
    }

    public function insertMhs($data)
    {
        $this->db->transBegin();

        $user = auth()->getProvider();
        $users = new EntitiesUser([
            'username' => $data['username'],
            'password' => $data['email'],
            'email' => $data['email'],
        ]);
        $idUser = $user->insert($users, true);

        $users = new EntitiesUser([
            'id' => $idUser,
        ]);
        $users->addGroup('mahasiswa');

        $mahasiswa = [
            'account_id' => $idUser,
            'nama' => $data['nama'],
            'npm' => $data['npm'],
            'tmpt_tgl_lahir' => $data['tmpt_tgl_lahir'],
            'alamat' => $data['alamat'],
            'whatsapp' => $data['whatsapp'],
        ];

        $this->db->table('mahasiswa')->insert($mahasiswa);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function insertPerusahaan($data)
    {
        $this->db->transBegin();

        $user = auth()->getProvider();
        $users = new EntitiesUser([
            'username' => $data['username'],
            'password' => $data['email'],
            'email' => $data['email'],
        ]);
        $idUser = $user->insert($users, true);

        $users = new EntitiesUser([
            'id' => $idUser,
        ]);
        $users->addGroup('perusahaan');

        $perusahaan = [
            'account_id' => $idUser,
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'deskripsi' => $data['deskripsi'],
            'email' => $data['email'],
            'whatsapp' => $data['whatsapp'],
            'avatar' => $data['avatar']
        ];

        $this->db->table('perusahaan')->insert($perusahaan);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function insertAdmin($data, $group)
    {
        $this->db->transBegin();

        $user = auth()->getProvider();
        $users = new EntitiesUser([
            'username' => $data['username'],
            'password' => $data['email'],
            'email' => $data['email'],
        ]);
        $idUser = $user->insert($users, true);

        $users = new EntitiesUser([
            'id' => $idUser,
        ]);
        $users->addGroup($group);

        $admin = [
            'account_id' => $idUser,
            'nama' => $data['nama'],
            'whatsapp' => $data['whatsapp'],
        ];

        $this->db->table('admin')->insert($admin);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function createAccPerusahaan($data)
    {
        $this->db->transBegin();

        $user = auth()->getProvider();
        $users = new EntitiesUser([
            'username' => $data['username'],
            'password' => $data['email'],
            'email' => $data['email'],
        ]);
        $idUser = $user->insert($users, true);

        $users = new EntitiesUser([
            'id' => $idUser,
        ]);
        $users->addGroup('perusahaan');

        $perusahaan = [
            'account_id' => $idUser,
        ];

        $this->db->table('perusahaan')->where('id', $data['id'])->update($perusahaan);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            return false;
        } else {
            $this->db->transCommit();
            return true;
        }
    }

    public function updateUser($data)
    {
        $tabel = $data['group'];
        unset($data['group']);
        $oldAvatar = $this->db->table($tabel)
            ->select('avatar')->getWhere(['account_id' => $data['account_id']])->getRow()->avatar;

        $this->db->transBegin();
        $save = $this->db->table($tabel)
            ->whereIn('account_id', [$data['account_id']])
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

    public function deleteUser($id)
    {
        $this->db->transBegin();
        $group = $this->getGroup($id);

        switch ($group) {
            case 'mahasiswa':
                $tabel = 'mahasiswa';
                break;

            case 'perusahaan':
                $tabel = 'perusahaan';
                break;

            case 'admin':
                $tabel = 'admin';
                break;

            case 'verifikator':
                $tabel = 'admin';
                break;

            default:
                return false;
        }

        if ($group == 'perusahaan') {
            $edit = $this->db->table($tabel)
            ->where(['account_id' => $id])
            ->set(['account_id' => null])
            ->update();
            
        } else {
            $edit = $this->db->table($tabel)
                ->where(['account_id' => $id])
                ->delete();
        }

        $users = auth()->getProvider();

        $users->delete($id, true);

        if (!$edit) {
            $this->db->transRollback();
            return false;
        }

        $this->db->transCommit();

        $this->db->transComplete();
        return true;
    }
}
