<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;

class Role extends BaseController
{
    protected $RoleModel;
    protected $UserModel;

    public function __construct()
    {
        $this->RoleModel = new RoleModel();
        $this->UserModel = new UserModel();
        $this->CheckUser = $this->UserModel
            ->where('username', session()->get('username'))
            ->first();
    }

    public function index()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'title' => 'Data Role',
                'role' => $this->RoleModel->findAll(),
            ];

            return view('admin/v_role', $data);
        }
    }

    public function save_role()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'role' => $this->request->getVar('role'),
            ];
            $this->RoleModel->save($data);
            return redirect()->to('/role');
        }
    }

    public function edit_role()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'id_role' => $this->request->getVar('id'),
                'role' => $this->request->getVar('role'),
            ];
            $this->RoleModel->save($data);
            return redirect()->to('/role');
        }
    }
    
    public function hapus_role()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id = $this->request->getVar('id');
            $this->RoleModel->where('id_role', $id)->delete();
            return redirect()->to('/role');
        }
    }
}
