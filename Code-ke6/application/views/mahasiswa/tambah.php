<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Form Tambah Data Mahasiswa</div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="number" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan" class="form-group">
                                <?php foreach ($jurusan as $key) : ?>
                                    <option value="<?= $key ?>"><?= $key ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>&nbsp;
                            <br>
                            <?php foreach ($jeniskelamin as $key) : ?>
                                <input type="radio" id="jeniskelamin" name="jeniskelamin" value="<?= $key ?>"> <?= $key ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>