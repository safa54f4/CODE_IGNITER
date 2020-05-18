@extends('layouts.app')

<?php
// dd($userinfo->nama);
?>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit User
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value=" <?= $userinfo['nama'] ?>" class="form-control @error('nama') is-invalid @enderror" />
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{ (!empty(old("email")) ? old("email") : $userinfo['email'] ) }}" class="form-control @error('email') is-invalid @enderror" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select class="custom-select @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                                <option value="">Pilih salah satu jabatan</option>
                                @foreach ($levels as $level)
                                    @if (!empty(old("jabatan")) && old("jabatan") == $level['id'])
                                            <option   value="{{$level['id']}}" selected>{{$level['nama']}}</option>
                                        @elseif ($userinfo['level_id'] == $level['id'])
                                            <option   value="{{$level['id']}}" selected>{{$level['nama']}}</option>
                                        @else
                                            <option  value="{{$level['id']}}">{{$level['nama']}}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('jabatan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div id="div-mahasiswa">
                            <div class="form-group">
                                <label for="kota_lahir">Kota Lahir</label>
                                <input type="text" name="kota_lahir" id="kota_lahir" value="{{ ($userinfo['level_id'] == 2 ? (!empty(old("kota_lahir")) ? old("kota_lahir") : $userinfo['kota_lahir'] ): "") }}" class="form-control @error('kota_lahir') is-invalid @enderror" />
                                @error('kota_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" value="{{ ($userinfo['level_id'] == 2 ? (!empty(old("nik")) ? old("nik") : $userinfo['nik'] ): "") }}"  class="form-control @error('nik') is-invalid @enderror" />
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ ($userinfo['level_id'] == 2 ? (!empty(old("kelas")) ? old("kelas") : $userinfo['kelas'] ): "") }}" />
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <a href="{{route("user.index")}}"  class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")

@endsection
