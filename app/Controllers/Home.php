<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlternatifModel;

class Home extends BaseController
{
    protected $AlternatifModel;

    public function __construct()
    {
        $this->AlternatifModel = new AlternatifModel();
    }

    /** Method untuk menampilkan halaman home user */
    public function index()
    {
        $data = [
            'title' => 'Home',
            'alternatif' => $this->AlternatifModel->findAll()
        ];

        return view('home', $data);
    }
}
