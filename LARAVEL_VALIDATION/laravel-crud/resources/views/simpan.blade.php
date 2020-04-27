@extends('master')

@section('title', 'Validasi Data')

@section('judul_halaman', 'Validasi Data Mahasiswa')

@section('konten')
<h3 class="my-4">Data Yang Di input :</h3>

<table class="table table-bordered table-striped">
<tr>
    <td style="width:150px">nama</td>
    <td>{{ $data->namamhs}}</td>
</tr>
<tr>
    <td>NIM</td>
    <td>{{ $data ->nimmhs}}</td>
</tr>

<tr>
    <td>Email</td>
    <td>{{ $data ->emailmhs}}</td>
</tr>

<tr>
    <td>Jurusan</td>
    <td>{{ $data ->jurusanmhs }}</td>
</tr>


</table>

<a href="/mahasiswa" class="btn btn-primary">kembali</a>
@endsection