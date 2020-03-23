<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Detail Data matakuliah
            </div>
            <div class="card-body">
                <h5 class="card-title"><?= $matakuliah['matakuliah']; ?></h5>
                <p class="card-text">
                   <label for=""><b> kode:</b></label>
                   <?= $matakuliah['kode']; ?></p>
                <p class="card-text">
                   <label for=""><b> jam:</b></label>
                   <?= $matakuliah['jam']; ?></p>
                <p class="card-text">
                   <label for=""><b> semester:</b></label>
                   <?= $matakuliah['semester']; ?></p>
                <a href="<?= base_url();?>matakuliah" class="btn btn-primary">kembali</a>
            </div>
        </div>
        </div>
    </div>
</div>