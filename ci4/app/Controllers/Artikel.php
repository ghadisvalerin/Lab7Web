<?php
namespace App\Controllers;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;
class Artikel extends BaseController
{
public function index()
{
$title = 'Daftar Artikel';
$model = new ArtikelModel();
$artikel = $model->getArtikelDenganKategori(); // Use the new method
return view('artikel/index', compact('artikel', 'title'));
}
public function admin_index()
{
    $title = 'Daftar Artikel (Admin)';
    $model = new ArtikelModel();
    $q = $this->request->getVar('q') ?? '';
    $kategori_id = $this->request->getVar('kategori_id') ?? '';
    $sort = $this->request->getVar('sort') ?? ''; // Tambahkan sort
    $page = $this->request->getVar('page') ?? 1;

    $builder = $model->table('artikel')
        ->select('artikel.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id_kategori = artikel.id_kategori');

    if ($q != '') {
        $builder->like('artikel.judul', $q);
    }
    if ($kategori_id != '') {
        $builder->where('artikel.id_kategori', $kategori_id);
    }

    // Sorting berdasarkan judul
    if ($sort === 'judul_asc') {
        $builder->orderBy('artikel.judul', 'ASC');
    } elseif ($sort === 'judul_desc') {
        $builder->orderBy('artikel.judul', 'DESC');
    } else {
        $builder->orderBy('artikel.id', 'ASC'); // UBAH INI: dari DESC ke ASC
    }

    $artikel = $builder->paginate(10, 'default', $page);
    $pager = $model->pager;

    $data = [
        'title' => $title,
        'q' => $q,
        'kategori_id' => $kategori_id,
        'sort' => $sort,
        'artikel' => $artikel,
        'pager' => $pager
    ];

    if ($this->request->isAJAX()) {
        // Kembalikan partial view untuk AJAX
        return view('artikel/ajax_list', $data);
    } else {
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();
        return view('artikel/admin_index', $data);
    }
}

public function add()
{
    if ($this->request->isAJAX()) {
        $rules = [
            'judul' => 'required',
            'id_kategori' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => implode('<br>', $this->validator->getErrors())
            ]);
        }

        $model = new ArtikelModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'slug' => url_title($this->request->getPost('judul')),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'status' => 1
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Artikel berhasil ditambahkan'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menambahkan artikel'
            ]);
        }
    }

    // Jika bukan AJAX, tampilkan form biasa
    $kategoriModel = new KategoriModel();
    $data['kategori'] = $kategoriModel->findAll();
    $data['title'] = "Tambah Artikel";
    return view('artikel/form_add', $data);
}

public function edit($id)
{
    $artikel = new ArtikelModel();

    // Validasi data input
    $validation = \Config\Services::validation();
    $validation->setRules([
        'judul' => 'required',
        'isi'   => 'required'
    ]);

    $isDataValid = $validation->withRequest($this->request)->run();

    if ($isDataValid) {
        // Update artikel
        $artikel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'id_kategori' => $this->request->getPost('id_kategori')
        ]);
        return redirect()->to('admin/artikel')->with('success', 'Artikel berhasil diperbarui');
    }

    // Ambil data artikel lama
    $data = $artikel->where('id', $id)->first();
    $kategoriModel = new \App\Models\KategoriModel();
    $kategori = $kategoriModel->findAll();

    $title = "Edit Artikel";

    return view('artikel/form_edit', [
        'title' => $title,
        'artikel' => $data, // Penting!
        'kategori' => $kategori
    ]);
}
public function delete($id)
{
$model = new ArtikelModel();
$model->delete($id);
return redirect()->to('/admin/artikel');
}
public function view($slug)
{
$model = new ArtikelModel();
$data['artikel'] = $model->where('slug', $slug)->first();
if (empty($data['artikel'])) {
throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot

find the article.');
}
$data['title'] = $data['artikel']['judul'];
return view('artikel/detail', $data);
}
}