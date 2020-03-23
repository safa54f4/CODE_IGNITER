<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Mahasiswa
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        <img src="<?= base_url('images/') . $mahasiswa['foto']; ?>" alt="" width="130px">
                    </h4>
                    <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                    <p class="card-text">
                        <label for=""><b> Email:</b></label>
                        <?= $mahasiswa['email']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Nim:</b></label>
                        <?= $mahasiswa['nim']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Jurusan:</b></label>
                        <?= $mahasiswa['jurusan']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Jenis Kelamin:</b></label>
                        <?= $mahasiswa['jeniskelamin']; ?></p>
                    <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>