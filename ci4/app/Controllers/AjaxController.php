<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax/index');
    }

    public function getData()
{
    $model = new ArtikelModel();
    $data = $model->getAllArtikel();
    
    // Format data untuk ditampilkan
    foreach ($data as &$artikel) {
        $artikel['status_text'] = $artikel['status'] == 1 ? 'Aktif' : 'Nonaktif';
    }
    
    return $this->response->setJSON($data);
}
    
    public function create()
    {
        $model = new ArtikelModel();
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'penulis' => $this->request->getPost('penulis')
        ];
        
        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil ditambahkan'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menambahkan data'
            ]);
        }
    }
    
    public function update($id)
    {
        $model = new ArtikelModel();
        
        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'penulis' => $this->request->getPost('penulis')
        ];
        
        if ($model->update($id, $data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil diupdate'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal mengupdate data'
            ]);
        }
    }
    
    public function delete($id)
    {
        $model = new ArtikelModel();
        
        if ($model->delete($id)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menghapus data'
            ]);
        }
    }
}