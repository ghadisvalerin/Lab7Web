<?= $this->include('template/header'); ?>

<section id="contact" style="padding: 20px;">
    <h2><?= esc($title) ?></h2>
    <p>Silakan hubungi saya melalui formulir di bawah ini:</p>

    <form action="/kirim-pesan" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pesan">Pesan:</label>
            <textarea name="pesan" id="pesan" rows="5" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
    </form>

    <hr>

    <h4>Kontak Langsung</h4>
    <p>Email: ghadisclaudia@gmail.com</p>
    <p>Alamat: Cikarang, Indonesia.</p>
</section>

<?= $this->include('template/footer'); ?>