<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['judul', 'isi', 'gambar', 'status', 'slug', 'id_kategori'];

    // Timestamps menggunakan kolom 'tanggal' yang sudah ada
    protected $useTimestamps = false; // Karena hanya ada 1 kolom tanggal

    // Validasi dasar
    protected $validationRules = [
        'judul' => 'required|min_length[3]|max_length[200]',
        'isi' => 'required|min_length[10]'
    ];

    protected $validationMessages = [
        'judul' => [
            'required' => 'Judul artikel harus diisi',
            'min_length' => 'Judul minimal 3 karakter',
            'max_length' => 'Judul maksimal 200 karakter'
        ],
        'isi' => [
            'required' => 'Isi artikel harus diisi',
            'min_length' => 'Isi artikel minimal 10 karakter'
        ]
    ];

    /**
     * Get artikel dengan kategori (method existing Anda)
     */
    public function getArtikelDenganKategori()
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->orderBy('artikel.tanggal', 'DESC')
            ->get()
            ->getResultArray();
    }

    /**
     * Get semua artikel (untuk AJAX)
     */
    public function getAllArtikel()
    {
        return $this->orderBy('tanggal', 'DESC')->findAll();
    }

    /**
     * Get artikel berdasarkan ID
     */
    public function getArtikelById($id)
    {
        return $this->find($id);
    }

    /**
     * Get artikel berdasarkan status
     * Status: 0 = nonaktif, 1 = aktif
     */
    public function getArtikelByStatus($status = 1)
    {
        return $this->where('status', $status)
                    ->orderBy('tanggal', 'DESC')
                    ->findAll();
    }

    /**
     * Get artikel aktif saja
     */
    public function getArtikelAktif()
    {
        return $this->getArtikelByStatus(1);
    }

    /**
     * Update status artikel
     */
    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }

    /**
     * Aktifkan artikel
     */
    public function aktivartikel($id)
    {
        return $this->updateStatus($id, 1);
    }

    /**
     * Nonaktifkan artikel
     */
    public function nonaktifartikel($id)
    {
        return $this->updateStatus($id, 0);
    }

    /**
     * Search artikel
     */
    public function searchArtikel($keyword)
    {
        return $this->like('judul', $keyword)
                    ->orLike('isi', $keyword)
                    ->orderBy('tanggal', 'DESC')
                    ->findAll();
    }

    /**
     * Get artikel berdasarkan kategori
     */
    public function getArtikelByKategori($id_kategori)
    {
        return $this->where('id_kategori', $id_kategori)
                    ->where('status', 1)
                    ->orderBy('tanggal', 'DESC')
                    ->findAll();
    }

    /**
     * Get artikel terbaru
     */
    public function getArtikelTerbaru($limit = 5)
    {
        return $this->where('status', 1)
                    ->orderBy('tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Count artikel berdasarkan status
     */
    public function countArtikel($status = null)
    {
        if ($status !== null) {
            return $this->where('status', $status)->countAllResults();
        }
        return $this->countAllResults();
    }

    /**
     * Insert artikel baru dengan tanggal otomatis
     */
    public function insertArtikel($data)
    {
        // Tambahkan tanggal saat ini jika tidak ada
        if (!isset($data['tanggal'])) {
            $data['tanggal'] = date('Y-m-d H:i:s');
        }
        
        // Set status default jika tidak ada
        if (!isset($data['status'])) {
            $data['status'] = 1; // Default nonaktif
        }

        return $this->insert($data);
    }

    /**
     * Generate slug otomatis dari judul
     */
    public function generateSlug($judul)
    {
        $slug = url_title($judul, '-', true);
        
        // Cek apakah slug sudah ada
        $count = $this->where('slug', $slug)->countAllResults();
        
        if ($count > 0) {
            $slug = $slug . '-' . ($count + 1);
        }
        
        return $slug;
    }
}