<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($artikel)) : ?>
            <?php foreach ($artikel as $a) : ?>
                <tr>
                    <td><?= $a['id']; ?></td>
                    <td>
                        <b><?= esc($a['judul']); ?></b>
                        <p><small><?= esc(substr($a['isi'], 0, 50)); ?>...</small></p>
                    </td>
                    <td><?= esc($a['nama_kategori']); ?></td>
                    <td><?= $a['status'] == 1 ? 'Aktif' : 'Draft'; ?></td>
                    <td>
                        <a href="/admin/artikel/edit/<?= $a['id']; ?>" class="btn btn-sm btn-info">Ubah</a>
                        <a href="/admin/artikel/delete/<?= $a['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php else : ?>
            <tr><td colspan="5" class="text-center">Tidak ada artikel.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- pagination -->
<?= $pager->links() ?>
