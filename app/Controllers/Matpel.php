<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\MatpelModel;

class Matpel extends BaseController
{
    protected $MatpelModel;
    protected $UserModel;

    public function __construct()
    {
        $this->MatpelModel = new MatpelModel();
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
                'title' => 'Data Matpel',
                'matpel' => $this->MatpelModel->findAll(),
            ];

            return view('admin/v_matpel', $data);
        }
    }

    public function save_matpel()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'matpel' => $this->request->getVar('matpel'),
            ];
            $this->MatpelModel->save($data);
            return redirect()->to('/matpel');
        }
    }

    public function edit_matpel()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $data = [
                'id_matpel' => $this->request->getVar('id'),
                'matpel' => $this->request->getVar('matpel'),
            ];
            $this->MatpelModel->save($data);
            return redirect()->to('/matpel');
        }
    }
    
    public function hapus_matpel()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id = $this->request->getVar('id');
            $this->MatpelModel->delete($id);
            return redirect()->to('/matpel');
        }
    }
}
