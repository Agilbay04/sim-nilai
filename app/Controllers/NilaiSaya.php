<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\NilaiModel;

class NilaiSaya extends BaseController
{
    protected $UserModel;
    protected $SiswaModel;
    protected $NilaiModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->SiswaModel = new SiswaModel();
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
            if (session()->get('role') != 3) {
                return redirect()->to('/dashboard');
            }

            $user = $this->UserModel->join('siswa', 'siswa.id_user = user.id_user')
                ->where('user.id_user', session()->get('id'))->first();

            $data = [
                'title' => 'Nilai Saya',
                'nilai' => $this->NilaiModel
                    ->join('siswa', 'siswa.id_siswa = nilai.id_siswa')
                    ->join('matpel', 'matpel.id_matpel = nilai.id_matpel')
                    ->where('nilai.id_siswa', $user['id_siswa'])
                    ->findAll(),
            ];
            return view('siswa/v_nilai_saya', $data);
        }
    }
}
