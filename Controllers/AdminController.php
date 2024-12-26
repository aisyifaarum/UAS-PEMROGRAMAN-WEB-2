<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TamuModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function datatamu()
    {
        $tamuModel = model('TamuModel');
        $data['tamu'] = $tamuModel->findAll();
        return view('admin/datatamu', $data);
    }
    
    public function create_tamu()
    {
        $tamuModel = model('TamuModel');
        $data = $this->request->getPost();

        if ($tamuModel->insert($data, false)) {
            return redirect()->to('admin/datatamu')->with('sukses', 'Data berhasil disimpan!');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal disimpan!');
        }
    }
    
    public function edit_tamu($id)
    {
        $tamuModel = model('TamuModel');
        $data['tamuPernikahan'] = $tamuModel->find($id);

        return view('admin/edit', $data);
    }
    public function update_tamu($id)
    {
        $tamuModel = model('TamuModel');
        $data = $this->request->getPost();

        if ($tamuModel->update($id, $data)) {
            return redirect()->to('admin/datatamu')->with('sukses', 'Data berhasil diupdate!');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal diupdate!');
        }
    }
    public function delete_tamu()
    {
        $id = $this->request->getPost('id');
        $tamuModel = model('TamuModel');
        if ($tamuModel->delete($id)) {
            return redirect()->to('admin/datatamu')->with('sukses', 'Data berhasil dihapus!');
        } else {
            return redirect()->back()->with('gagal', 'Data gagal dihapus!');
        }
    }
}
