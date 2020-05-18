@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Jadwal Perkuliahan
                    @if ($datauser->level_id == 1)
                    <a href="{{route("admin.tambah_jadwal")}}" class="btn btn-success float-right">Tambah Jadwal</a>
                    @endif
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Kode MK</th>
                                <th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Dosen</th>
                                @if ($datauser->level_id == 1)
                                <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($krs as $item )
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->hari}}</td>
                                <td>{{$item->jam}}</td>
                                <td>{{$item->kode_mk}}</td>
                                <td>{{$item->mata_kuliah}}</td>
                                <td>{{$item->kelas}}</td>
                                <td>{{$item->semester}}</td>
                                <td>{{$item->sks}}</td>
                                <td>{{$item->dosen}}</td>
                                @if ($datauser->level_id == 1)
                                <td><a href="{{route("admin.edit_jadwal", ["id" => $item->id])}}" class="btn btn-primary mr-2">Edit</a><a href="{{route("admin.hapus_jadwal", ["id" => $item->id])}}" class="btn btn-danger">Hapus</a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
