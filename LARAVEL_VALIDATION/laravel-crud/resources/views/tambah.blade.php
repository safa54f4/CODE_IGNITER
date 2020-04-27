@extends('master')
@section('title', 'Tambah Data')
@section('judul_halaman', 'Tambah Data Mahasiswa')
@section('konten')
<a href="/mahasiswa" class="btn btn-danger">kembali</a>
<br/>
<br/>
@if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all()as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="/mahasiswa/simpan" method="post">
{{csrf_field()}}
<div class="form-group">
    <label for="namamhs">Nama</label>
    <input type="text" class="form-control" required="requires" name="nama" value="{{ old('nama') }}"> <br/>
</div>
<div class="form-group">
    <label for="nimmhs">NIM</label>
    <input type="number" class="form-control" required="requires" name="nim"value="{{ old('nim') }}"> <br/>
</div>
<div class="form-group">
    <label for="emailmhs">E-Mail</label>
    <input type="text" class="form-control" required="requires" name="email"value="{{ old('email') }}"> <br/>
</div>
<div class="form-group">
    <label for="jurusanmhs">Jurusan</label>
    <input type="text" class="form-control" required="requires" name="jurusan"value="{{ old('jurusan') }}"> <br/>
</div>
<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
@endsection