<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <?php if(validation_errors()): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div> 
                    <?php endif ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama"
                            value="<?= $mahasiswa['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="number" name="nim" class="form-control" id="nim" placeholder="Nim"
                            value="<?= $mahasiswa['nim'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="your email"
                            value="<?= $mahasiswa['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">jurusan</label>
                            <select class="form-cotrol" name="jurusan" id="jurusan" name="jurusan">
                                <?php foreach($jurusan as $key): ?>
                                    <?php if($key == $mahasiswa['jurusan']): ?>
                                        <option value="<?=$key?>" selected><?= $key ?></option>
                                    <?php else : ?>
                                        <option value="<?= $key ?>"><?= $key ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>