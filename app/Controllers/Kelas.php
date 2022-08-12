<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;

class Kelas extends BaseController
{
    protected $KelasModel;
    protected $UserModel;

    public function __construct()
    {
        $this->KelasModel = new KelasModel();
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
                'title' => 'Data Kelas',
                'kelas' => $this->KelasModel->findAll(),
            ];

            return view('admin/v_kelas', $data);
        }
    }

    public function save_kelas()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'kelas' => $this->request->getVar('kelas'),
            ];
            $this->KelasModel->save($data);
            return redirect()->to('/kelas');
        }
    }

    public function edit_kelas()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'id_kelas' => $this->request->getVar('id'),
                'kelas' => $this->request->getVar('kelas'),
            ];
            $this->KelasModel->save($data);
            return redirect()->to('/kelas');
        }
    }
    
    public function hapus_kelas()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id = $this->request->getVar('id');
            $this->KelasModel->delete($id);
            return redirect()->to('/kelas');
        }
    }
}
