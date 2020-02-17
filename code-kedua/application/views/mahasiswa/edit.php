<div class="container">
<div class="row mt-3>">
<div class="col-md-6">
<div class="card">
<div class="card-header">
    Form Tambah Data Mahasiswa
</div>
<div class="card-body">
    <?php if(validation_errors()):?>
<div class="alert alert-danger" role="alert">
    <?= validation_errors(); ?>
</div>
<?php endif ?>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $mahasiswa['id'];?>">
<div class="form-group">
<label for="nama">Nama</label>
<input type="text" class="form-control" id="nama" value="<?=$mahasiswa['nama'];?>">
</div>
<div class="form-group">
<label for="nim">Nim</label>
<input type="number" class="form-control" id="nim"value="<?=$mahasiswa['nim'];?>">
</div>
<div class="form-group">
<label for="email">email</label>
<input type="email" class="form-control" id="email"value="<?=$mahasiswa['email'];?>">
</div>
<div class="form-group">
<label for="jurusan">Jurusan</label>
<select class="form-control" id="jurusan" name="jurusan">
    <?php foreach($jurusan as $key): ?>
        <?php if($key ==$mahasiswa['jurusan']) :?>
        <option value="<?= $key ?>"selected><?=$key ?></option>
        <?php else :?>
            <option value="<?= $key ?>"><?= $key ?></option>
        
<!-- <option selected>_____________________________________________________________________________________________________________</option>
<option value="kimia">Kimia</option>
<option value="mesin">Mesin</option>
<option value="informatika">Informatika</option>
<option value="akuntansi">Akuntansi</option>
<option value="elektro">Elektro</option>
<option value="sipil">Sipil</option> -->
        <?php endif; ?>
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