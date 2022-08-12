<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $UserModel;
    protected $AdminModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->AdminModel = new AdminModel();
    }

    /**  Method untuk menampilkan halaman login */
    public function index()
    {
        $data = [
            'title' => 'SPK GARIS | Login',
        ];

        return view('admin/login', $data);
    }

    /** Method untuk melakukan login */
    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->UserModel
            ->where('username', $username)
            ->join('role', 'role.id_role = user.role_id')
            ->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session()->set('id', $user['id_user']);
                session()->set('username', $user['username']);
                session()->set('role', $user['role_id']);
                
                session()->setFlashdata('message', 'login');
                return redirect()->to('/dashboard');
            }
        }

        return redirect()->to('/auth');
    }

    /** Method untuk logout */
    public function logout()
    {
        session()->setFlashdata('message', 'logout');
        session()->destroy();
        return redirect()->to('/');
    }
}
