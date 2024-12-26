<?php

namespace App\Controllers;

use App\Models\TamuModel;

class Home extends BaseController
{
    public function index()
    {
        $tamuModel = model('TamuModel');
        $data['tamu'] = $tamuModel->findAll();
        return view('home', $data);
    }
    public function save()
    {
        $tamuModel = new TamuModel();
        $data = ['nama' => $this->request->getPost('nama'), 
                 'no_hp' => $this->request->getPost('no_hp'), 
                 'tanggal_kehadiran' => $this->request->getPost('tanggal_kehadiran'), 
                 'kehadiran' => $this->request->getPost('kehadiran'), 
                 'pesan' => $this->request->getPost('pesan')];
        $tamuModel->insert($data);
        return redirect()->to('/home')->with('status', 'Data tamu berhasil disimpan!');
    }
}
