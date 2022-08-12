<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\NilaiModel;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Models\GuruModel;

class NilaiSiswa extends BaseController
{
    protected $SiswaModel;
    protected $NilaiModel;
    protected $UserModel;
    protected $KelasModel;
    protected $GuruModel;

    public function __construct()
    {
        $this->SiswaModel = new SiswaModel();
        $this->NilaiModel = new NilaiModel();
        $this->UserModel = new UserModel();
        $this->KelasModel = new KelasModel();
        $this->GuruModel = new GuruModel();
        $this->CheckUser = $this->UserModel
            ->where('username', session()->get('username'))
            ->first();
    }

    public function index()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 2) {
                return redirect()->to('/dashboard');
            }
            $guru = $this->GuruModel->join('user', 'user.id_user = guru.id_user')
                ->join('matpel', 'matpel.id_matpel = guru.id_matpel')
                ->where('guru.id_user', session()->get('id'))->first();
            $data = [
                'guru' => $guru,
                'title' => 'Nilai Siswa',
                'siswa_8' => $this->SiswaModel->join('kelas', 'kelas.id_kelas = siswa.kelas_id')
                    ->join('nilai', 'nilai.id_siswa = siswa.id_siswa')
                    ->where('nilai.id_matpel', $guru['id_matpel'])
                    ->where('kelas.kelas', '8')->findAll(),
                'siswa_9' => $this->SiswaModel->join('kelas', 'kelas.id_kelas = siswa.kelas_id')
                    ->join('nilai', 'nilai.id_siswa = siswa.id_siswa')
                    ->where('nilai.id_matpel', $guru['id_matpel'])
                    ->where('kelas.kelas', '9')->findAll(),
                'siswa_10' => $this->SiswaModel->join('kelas', 'kelas.id_kelas = siswa.kelas_id')
                    ->join('nilai', 'nilai.id_siswa = siswa.id_siswa')
                    ->where('nilai.id_matpel', $guru['id_matpel'])
                    ->where('kelas.kelas', '10')->findAll(),
            ];

            return view('guru/v_nilai_siswa', $data);
        }
    }

    public function save_nilaisiswa()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            if (session()->get('role') != 2) {
                return redirect()->to('/dashboard');
            }

            $data = [
                'id_nilai' => $this->request->getVar('id_nilai'),
                'nilai' => $this->request->getVar('nilai'),
            ];
            $this->NilaiModel->save($data);
            return redirect()->to('/nilaisiswa');
        }
    }
}
