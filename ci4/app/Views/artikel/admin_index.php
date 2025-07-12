<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<div class="row mb-3">
    <div class="col-md-6">
        <form id="search-form" class="form-inline">
            <input type="text" name="q" id="search-box" value="<?= $q; ?>" placeholder="Cari judul artikel" class="form-control mr-2">

            <select name="kategori_id" id="category-filter" class="form-control mr-2">
                <option value="">Semua Kategori</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>" <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="sort-by" class="form-control mr-2">
                <option value="">Urutkan</option>
                <option value="judul_asc">Judul A-Z</option>
                <option value="judul_desc">Judul Z-A</option>
            </select>

            <input type="submit" value="Cari" class="btn btn-primary">
        </form>
    </div>
</div>

<!-- Indikator loading -->
<div id="loading" style="display: none;">
    <div class="spinner-border text-primary" role="status"></div>
</div>

<!-- Container data -->
<div id="article-container"></div>
<div id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const articleContainer = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const searchForm = $('#search-form');
    const searchBox = $('#search-box');
    const categoryFilter = $('#category-filter');
    const sortBy = $('#sort-by');
    const loading = $('#loading');

    const fetchData = (url) => {
        loading.show();
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html', // server mengembalikan partial view
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (html) {
                articleContainer.html(html);
                loading.hide();
            },
            error: function () {
                articleContainer.html('<p class="text-danger">Gagal memuat data.</p>');
                loading.hide();
            }
        });
    };

    // Handle pencarian
    searchForm.on('submit', function (e) {
        e.preventDefault();
        const q = searchBox.val();
        const kategori_id = categoryFilter.val();
        const sort = sortBy.val();
        fetchData(`/admin/artikel?q=${q}&kategori_id=${kategori_id}&sort=${sort}`);
    });

    // Handle filter kategori atau sort berubah
    categoryFilter.on('change', function () {
        searchForm.trigger('submit');
    });
    sortBy.on('change', function () {
        searchForm.trigger('submit');
    });

    // Handle pagination
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (url !== '#') {
            fetchData(url);
        }
    });

    // Initial load
    fetchData('/admin/artikel');
});
</script>

<?= $this->include('template/admin_footer'); ?>
