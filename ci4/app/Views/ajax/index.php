<?= $this->include('template/header'); ?>

<h1>Data Artikel</h1>

<div class="mb-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#artikelModal">
        Tambah Artikel
    </button>
</div>

<table class="table table-striped table-data" id="artikelTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<!-- Modal Form -->
<div class="modal fade" id="artikelModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Tambah Artikel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="artikelForm">
                    <input type="hidden" id="artikelId">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="saveButton">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script>
$(document).ready(function() {
    // Function to display a loading message while data is fetched
    function showLoadingMessage() {
        $('#artikelTable tbody').html('<tr><td colspan="4">Loading data...</td></tr>');
    }

    // Buat fungsi load data
    function loadData() {
        showLoadingMessage(); // Display loading message initially
        
        // Lakukan request AJAX ke URL getData
        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET",
            dataType: "json",
            success: function(data) {
                // Tampilkan data yang diterima dari server
                var tableBody = "";
                if (data.length > 0) {
                    for (var i = 0; i < data.length; i++) {
                        var row = data[i];
                        tableBody += '<tr>';
                        tableBody += '<td>' + row.id + '</td>';
                        tableBody += '<td>' + row.judul + '</td>';
                        // Add a placeholder for the "Status" column
                        // Dalam function loadData() di view
                        tableBody += '<td><span class="badge bg-' + (row.status == 1 ? 'success' : 'danger') + '">' + (row.status == 1 ? 'Aktif' : 'Nonaktif') + '</span></td>';
                        tableBody += '<td>';
                        // Actions untuk edit dan delete
                        tableBody += '<button class="btn btn-sm btn-warning me-1 btn-edit" data-id="' + row.id + '">Edit</button>';
                        tableBody += '<button class="btn btn-sm btn-danger btn-delete" data-id="' + row.id + '">Delete</button>';
                        tableBody += '</td>';
                        tableBody += '</tr>';
                    }
                } else {
                    tableBody = '<tr><td colspan="4">Tidak ada data</td></tr>';
                }
                $('#artikelTable tbody').html(tableBody);
            },
            error: function() {
                $('#artikelTable tbody').html('<tr><td colspan="4">Error loading data</td></tr>');
            }
        });
    }

    // Load data saat halaman dimuat
    loadData();

    // Handle delete button click
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        
        if (confirm('Apakah Anda yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + id,
                method: "DELETE",
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        loadData(); // Reload data untuk merefleksikan perubahan
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting article: ' + textStatus + ' ' + errorThrown);
                }
            });
        }
    });

    // Handle edit button click (opsional - bisa dikembangkan lebih lanjut)
    $(document).on('click', '.btn-edit', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        
        // Redirect ke halaman edit atau buka modal edit
        window.location.href = "<?= base_url('artikel/edit/') ?>" + id;
    });
});
</script>

<?= $this->include('template/footer'); ?>