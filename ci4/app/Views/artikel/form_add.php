<?= $this->extend('layout/admin') ?>

<?= $this->section('content') ?>
<h2><?= $title; ?></h2>

<!-- Alert box untuk notifikasi -->
<div id="alert" style="display: none;" class="alert"></div>

<form id="form-tambah-artikel" method="post">
  <?= csrf_field() ?>
  <p>
    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul" value="<?= old('judul') ?>" required>
  </p>
  <p>
    <label for="isi">Isi</label>
    <textarea name="isi" id="isi" cols="50" rows="10" required><?= old('isi') ?></textarea>
  </p>
  <p>
    <label for="id_kategori">Kategori</label>
    <select name="id_kategori" id="id_kategori" required>
      <option value="">Pilih Kategori</option>
      <?php foreach($kategori as $k): ?>
        <option value="<?= $k['id_kategori']; ?>" <?= old('id_kategori') == $k['id_kategori'] ? 'selected' : '' ?>>
          <?= $k['nama_kategori']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </p>
  <p><input type="submit" value="Kirim" class="btn btn-large btn-primary"></p>
</form>

<!-- Tambahkan jQuery dan AJAX handler -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#form-tambah-artikel').on('submit', function(e) {
    e.preventDefault();
    const form = $(this);
    const formData = form.serialize();
    const alertBox = $('#alert');

    $.ajax({
      url: '<?= base_url('admin/artikel/add') ?>',
      type: 'POST',
      data: formData,
      dataType: 'json',
      success: function(res) {
        if (res.status === 'success') {
          alertBox
            .removeClass('alert-danger')
            .addClass('alert alert-success')
            .html(res.message)
            .fadeIn();

          form.trigger('reset');
        } else {
          alertBox
            .removeClass('alert-success')
            .addClass('alert alert-danger')
            .html(res.message)
            .fadeIn();
        }
      },
      error: function(xhr) {
        alertBox
          .removeClass('alert-success')
          .addClass('alert alert-danger')
          .html('Terjadi kesalahan saat mengirim data.')
          .fadeIn();
      }
    });
  });
</script>

<?= $this->endSection() ?>
