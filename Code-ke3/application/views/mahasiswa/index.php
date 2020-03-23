<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong> Berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url() ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Data mahasiswa" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="Submit">Cari</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Mahasiswa</h2>
            <?php if(empty($mahasiswa)): ?>
                <div class="alert alert-danger" role="alert">
                    Data Mahasiswa Tidak Ditemukan
                </div>
            <?php endif; ?>
            <table class="table table-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">NIM</th>
                    <th scope="col">email</th>
                    <th scope="col">jurusan</th>
                </tr>
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <tr>
                        <td><?= $mhs['nama']; ?></td>
                        <td><?= $mhs['nim']; ?></td>
                        <td><?= $mhs['email']; ?></td>
                        <td><?= $mhs['jurusan']; ?></td>
                        <td> <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin data ini akan dihapus?')">Hapus</a></td>
                        <td> <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs['id']; ?>" class="badge badge-success float-right">Edit</a></td>
                        <td> <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>