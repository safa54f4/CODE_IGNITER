@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Data User
                    <a href="{{route("user.tambah")}}" class="btn btn-success float-right">Tambah User</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user )
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{($user->level_id == 1 ? "Administrator" : "Mahasiswa")}}</td>
                            <td class="text-center"><a href="{{route("user.edit", ["id" => $user->id])}}" class="btn btn-primary mr-2">Edit</a><a href="{{route("user.hapus", ["id" => $user->id])}}" class="btn btn-danger">Hapus</a></td>
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
