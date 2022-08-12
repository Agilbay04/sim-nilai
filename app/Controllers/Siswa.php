<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\MatpelModel;
use App\Models\NilaiModel;

class Siswa extends BaseController
{
    protected $UserModel;
    protected $SiswaModel;
    protected $KelasModel;
    protected $MatpelModel;
    protected $NilaiModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->SiswaModel = new SiswaModel();
        $this->KelasModel = new KelasModel();
        $this->MatpelModel = new MatpelModel();
        $this->NilaiModel = new NilaiModel();
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
                'title' => 'Data Siswa',
                'siswa' => $this->SiswaModel
                    ->join('user', 'user.id_user = siswa.id_user')
                    ->join('kelas', 'siswa.kelas_id = kelas.id_kelas')
                    ->findAll(),
                'kelas' => $this->KelasModel->findAll(),
            ];

            return view('admin/v_siswa', $data);
        }
    }

    public function save_siswa()
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
                'role_id' => 3,
            ];
            $this->UserModel->save($user);
            $id_user = $this->UserModel->orderBy('id_user', 'DESC')->first();

            $siswa = [
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'NIS' => $this->request->getVar('nis'),
                'kelas_id' => $this->request->getVar('kelas'),
                'id_user' => $id_user['id_user'],
            ];
            $this->SiswaModel->save($siswa);
            $id_siswa = $this->SiswaModel->orderBy('id_siswa', 'DESC')->first();

            $matpel = $this->MatpelModel->findAll();
            $nilai = [];
            foreach ($matpel as $m) {
                $nilai[] = [
                    'id_siswa' => $id_siswa['id_siswa'],
                    'id_matpel' => $m['id_matpel'],
                    'nilai' => 0,
                ];
            }
            $this->NilaiModel->insertBatch($nilai);
            return redirect()->to('/siswa');
        }
    }

    public function edit_siswa()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id_user = $this->request->getVar('id_user');
            $id_siswa = $this->request->getVar('id_siswa');
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

            $siswa = [
                'id_siswa' => $id_siswa,
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'NIS' => $this->request->getVar('nis'),
                'kelas_id' => $this->request->getVar('kelas'),
            ];
            $this->SiswaModel->save($siswa);
            return redirect()->to('/siswa');
        }
    }

    public function hapus_siswa()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 1) {
                return redirect()->to('/dashboard');
            }
            $id_siswa = $this->request->getVar('id_siswa');
            $id_user = $this->request->getVar('id_user');
            $this->SiswaModel->delete($id_siswa);
            $this->UserModel->delete($id_user);
            return redirect()->to('/siswa');
        }
    }
}
