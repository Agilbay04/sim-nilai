<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Models\MatpelModel;

class Dashboard extends BaseController
{
    protected $UserModel;
    protected $SiswaModel;
    protected $GuruModel;
    protected $MatpelModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->SiswaModel = new SiswaModel();
        $this->GuruModel = new GuruModel();
        $this->MatpelModel = new MatpelModel();
        $this->CheckUser = $this->UserModel
            ->where('username', session()->get('username'))
            ->first();
    }

    /** Method untuk menampilkan dashbaord */
    public function index()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => 'Dashboard',
                'jml_siswa' => $this->SiswaModel->countAll(),
                'jml_guru' => $this->GuruModel->countAll(),
                'jml_matpel' => $this->MatpelModel->countAll(),
                'guru' => $this->GuruModel
                    ->join('user', 'user.id_user = guru.id_user')
                    ->join('matpel', 'matpel.id_matpel = guru.id_matpel')
                    ->where('user.username', session()->get('username'))
                    ->first(),
                'siswa' => $this->SiswaModel
                    ->join('user', 'user.id_user = siswa.id_user')
                    ->join('kelas', 'kelas.id_kelas = siswa.kelas_id')
                    ->where('user.username', session()->get('username'))
                    ->first(),
            ];

            return view('index', $data);
        }
    }
}
