@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Kartu Rencana Studi
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode MK</th>
                                <th>Mata Kuliah</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($krs as $item )
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->kode_mk}}</td>
                                <td>{{$item->mata_kuliah}}</td>
                                <td>{{$item->semester}}</td>
                                <td>{{$item->sks}}</td>
                                <td>{{$time->getDiffHour($item->pukul_awal, $item->pukul_akhir)}}</td>
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
