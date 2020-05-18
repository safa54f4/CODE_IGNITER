@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Jadwal Perkuliahan
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
                                <th>Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $item )
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->hari}}</td>
                                <td>{{$item->pukul_awal}} - {{$item->pukul_akhir}}</td>
                                <td>{{$item->kode_mk}}</td>
                                <td>{{$item->mata_kuliah}}</td>
                                <td>{{$item->dosen}}</td>
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
