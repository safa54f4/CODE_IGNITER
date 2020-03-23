<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Form Tambah Data Matakuliah</div>
                <div class="card-body">
                <?php if (validation_errors()):?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode">
                        </div>
                        <div class="form-group">
                            <label for="matakuliah">Mata Kuliah</label>
                            <input type="text" class="form-control" id="matakuliah" name="matakuliah">
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="number" class="form-control" id="jam" name="jam">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="semester" class="form-control" id="semester" name="semester">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                    <div class="form-group">
                            <label for="matakuliah">matakuliah</label>
                            <select class="form-control" name="matakuliah" id="matakuliah" class="form-group">
                                <option selected>Pilih matakuliah</option>
                                <option value="Teknik Informatika">Agama Islam</option>
                                <option value="Teknik Sipil">Agama Katolik</option>
                                <option value="Teknik Mesin">Agama Kristen</option>
                                <option value="Teknik Mesin">Agama Hindu</option>
                                <option value="Teknik Mesin">Agama Budha</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Edit</button>
                    </form>
                </div>
        </div>
    </div>
</div>
</div>