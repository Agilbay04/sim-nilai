<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\MatpelModel;

class Guru extends BaseController
{
    protected $UserModel;
    protected $GuruModel;
    protected $MatpelModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->GuruModel = new GuruModel();
        $this->MatpelModel = new MatpelModel();
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
                'title' => 'Data Guru',
                'guru' => $this->GuruModel
                ->join('user', 'user.id_user = guru.id_user')
                ->join('matpel', 'guru.id_matpel = matpel.id_matpel')
                ->findAll(),
                'matpel' => $this->MatpelModel->findAll(),
            ];

            return view('admin/v_guru', $data);
        }
    }

    public function save_guru()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $user = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
            ];
            $this->UserModel->save($user);
            $id_user = $this->UserModel->orderBy('id_user', 'DESC')->first();

            $guru = [
                'nama_guru' => $this->request->getVar('nama_guru'),
                'NIP' => $this->request->getVar('nip'),
                'id_matpel' => $this->request->getVar('matpel'),
                'id_user' => $id_user['id_user'],
            ];
            $this->GuruModel->save($guru);
            return redirect()->to('/guru');
        }
    }

    public function edit_guru()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id_user = $this->request->getVar('id_user');
            $id_guru = $this->request->getVar('id_guru');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            if ($password == '') {
                $user = [
                    'id_user' => $id_user,
                    'username' => $username,
                ];
                $this->UserModel->save($user);
            } else {
                $user = [
                    'id_user' => $id_user,
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ];
                $this->UserModel->save($user);
            }

            $guru = [
                'id_guru' => $id_guru,
                'nama_guru' => $this->request->getVar('nama_guru'),
                'NIP' => $this->request->getVar('nip'),
                'id_matpel' => $this->request->getVar('matpel'),
            ];
            $this->GuruModel->save($guru);
            return redirect()->to('/guru');
        }
    }

    public function hapus_guru()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id_guru = $this->request->getVar('id_guru');
            $id_user = $this->request->getVar('id_user');
            $this->GuruModel->delete($id_guru);
            $this->UserModel->delete($id_user);
            return redirect()->to('/guru');
        }
    }
}
