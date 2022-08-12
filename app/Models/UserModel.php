<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    # protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    # protected $useAutoIncrement = true;
    # protected $insertID         = 0;
    # protected $returnType       = 'array';
    # protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username', 'password', 'role_id'];

    // Dates
    # protected $useTimestamps = true;
    # protected $dateFormat    = 'datetime';
    # protected $createdField  = 'created_usr';
    # protected $updatedField  = 'updated_usr';
    # protected $deletedField  = 'deleted_at';

    // Validation
    # protected $validationRules      = [];
    # protected $validationMessages   = [];
    # protected $skipValidation       = false;
    # protected $cleanValidationRules = true;

    // Callbacks
    # protected $allowCallbacks = true;
    # protected $beforeInsert   = [];
    # protected $afterInsert    = [];
    # protected $beforeUpdate   = [];
    # protected $afterUpdate    = [];
    # protected $beforeFind     = [];
    # protected $afterFind      = [];
    # protected $beforeDelete   = [];
    # protected $afterDelete    = [];
}
