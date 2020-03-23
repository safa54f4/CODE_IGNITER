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
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="number" name="nim" class="form-control" id="nim" placeholder="Nim">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="your email">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">jurusan</label>
                            <select class="form-cotrol" name="jurusan" id="jurusan" name="jurusan">
                                <?php foreach($jurusan as $key): ?>
                                    <option value="<?= $key ?>" selected > <?= $key ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>