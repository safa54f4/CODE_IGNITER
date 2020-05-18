<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Home
        </div>
        <div class="card-body">
            Selamat Datang Di SIAKAD Polpolan
        </div>
        <div class="card-footer">
            <?php if (!empty($data) && $data != null) : ?>
                <a href="/mahasiswa" class="btn btn-primary">Data Mahasiswa</a>
            <?php else : ?>
                <a href="/auth/login" class="btn btn-primary">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>