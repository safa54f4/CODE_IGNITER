
<div class="container">
<?php if($this->session->flashdata('flash-data')): ?>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Matakuliah <strong> berhasil </strong> <?= $this->session->flashdata('flash-data');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
<?php endif ; ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url();?>matakuliah/tambah"class="btn btn-primary"> Tambah Data</a>
        </div>
    </div>
    <!-- mt-3 artinya margin top 3 -->
<div class="row mt-3"> 
    <div class="col-md-6">
        <h2>Daftar matakuliah</h2>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Kode</th>
      <th scope="col">Mata kuliah</th>
      <th scope="col">Jam</th>
      <th scope="col">Semester</th></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($matakuliah as $mt):?>
    <tr>
        <td>
            <?= $mt['kode'] ?>
        </td>
        <td>
            <?= $mt['matakuliah'] ?>
        </td>
        <td>
            <?= $mt['jam'] ?>
        </td>
        <td>
            <?= $mt['semester'] ?>
        </td>
        <td>
        <a href="<?= base_url();?>matakuliah/hapus/<?= $mt['id_matkul'];?>"
                    class="badge badge-danger float-right"
                    onclick="return confirm('Yakin Data ini akan dihapus?');">Hapus</a>
                    <a href="<?= base_url();?>matakuliah/edit/<?=$mt['id_matkul'];?>"
                    class="badge badge-success float-right">Edit</a>
                    <a href="<?= base_url();?>matakuliah/detail/<?=$mt['id_matkul'];?>"
                    class="badge badge-primary float-right">detail</a>
                </li>
      </td>
        </tr>
      <?php endforeach;?>
       
  </tbody>
</table>
        
        <!-- <table class="table table-striped info">
                <tr>
                    <td>NAMA</td>
                    <td>NIM</td>
                    <td>EMAIL</td>
                    <td>JURUSAN</td>
                </tr>
            </table> -->
    </div>
</div>
</div>
