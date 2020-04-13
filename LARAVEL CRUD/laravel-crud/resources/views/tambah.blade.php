@extends('master')
@section('title', 'Tambah Data')
@section('judul_halaman', 'Tambah Data Mahasiswa')
@section('konten')
<a href="/mahasiswa" class="btn btn-danger">kembali</a>
<br/>
<br/>
<form action="/mahasiswa/simpan" method="post">
{{csrf_field()}}
<div class="form-group">
    <label for="namamhs">Nama</label>
    <input type="text" class="form-control" required="requires" name="namamhs"> <br/>
</div>
<div class="form-group">
    <label for="nimmhs">NIM</label>
    <input type="number" class="form-control" required="requires" name="nimmhs"> <br/>
</div>
<div class="form-group">
    <label for="emailmhs">E-Mail</label>
    <input type="text" class="form-control" required="requires" name="emailmhs"> <br/>
</div>
<div class="form-group">
    <label for="jurusanmhs">Jurusan</label>
    <input type="text" class="form-control" required="requires" name="jurusanmhs"> <br/>
</div>
<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
@endsection