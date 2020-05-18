@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Hapus Jadwal
                </div>

                <div class="card-body">
                    Anda yakin menghapus jadwal Mata Kuliah {{$krs->mata_kuliah}} ({{$krs->kode_mk}}) pada hari {{$krs->hari}}  yang diajari oleh {{$krs->dosen}}?
                </div>
                <div class="card-footer">
                    <form action="" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="{{route("admin.jadwal")}}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
