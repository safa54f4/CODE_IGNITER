@extends('layouts.app')
<?php
// dd($userinfo);
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Mahasiswa</div>

                <div class="card-body">
                    <h4>Data Mahasiswa</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-3">Nama Lengkap</div>
                        <div class="col-9">{{$userinfo->nama}}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Kota Lahir</div>
                        <div class="col-9">{{$userinfo->kota_lahir}}</div>
                    </div>
                    <div class="row">
                        <div class="col-3">Email</div>
                        <div class="col-9">{{$userinfo->email}}</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">NIK</div>
                        <div class="col-9">{{$userinfo->nik}}</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3">Kelas</div>
                        <div class="col-9">{{$userinfo->kelas}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
