@extends('layouts.app')
<?php
$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Jadwal
                    {{-- <a href="#" class="btn btn-success float-right">Tambah User</a> --}}
                </div>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                        <label for="kode_mk">Kode MK</label>
                        <input type="text" name="kode_mk" id="kode_mk" value="{{  $krs->kode_mk  }}" class="form-control @error('kode_mk') is-invalid @enderror" />
                            @error('kode_mk')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mata_kuliah">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" id="mata_kuliah" value="{{  $krs->mata_kuliah  }}" class="form-control @error('mata_kuliah') is-invalid @enderror" />
                            @error('mata_kuliah')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dosen">Dosen</label>
                            <input type="text" name="dosen" id="dosen" value="{{ (!empty(old("dosen")) ? old("dosen") : $krs->dosen ) }}" class="form-control @error('dosen') is-invalid @enderror" />
                            @error('dosen')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jam">Waktu</label>
                            <div class="row"  id="jam">
                                <div class="col">
                                    <input type="text" name="jam"  value="{{ $krs->jam }}" class="form-control @error('jam') is-invalid @enderror" />
                                    @error('jam')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari</label>
                                <input type="text" name="hari"  value="{{ $krs->hari }}" class="form-control @error('hari') is-invalid @enderror" />
                                {{-- <select class="custom-select @error('hari') is-invalid @enderror" name="hari" id="hari">
                                <option value="">Pilih hari</option>
                                @foreach ($hari as $iitem)
                                @if (!empty(old("hari")))
                                    <option value="{{$iitem}}" {{((old("hari") == $iitem) ? "selected" : "")}}>{{$iitem}}</option>
                                @elseif ($krs->hari == $iitem)
                                    <option value="{{$iitem}}" selected >{{$iitem}}</option>
                                @else
                                    <option value="{{$iitem}}">{{$iitem}}</option>
                                @endif
                                @endforeach --}}
                                {{-- <option value="">Pilih hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option> --}}
                            {{-- </select> --}}
                            {{-- <input type="text" name="hari" id="hari" value="{{ old("hari") ?? ""}}" class="form-control @error('hari') is-invalid @enderror" /> --}}
                            @error('hari')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" id="semester" value="{{ (!empty(old("semester")) ? old("semester") : $krs->semester ) }}" class="form-control @error('semester') is-invalid @enderror" />
                            @error('semester')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS</label>
                            <input type="text" name="sks" id="sks" value="{{ (!empty(old("sks")) ? old("sks") : $krs->sks ) }}" class="form-control @error('sks') is-invalid @enderror" />
                            @error('sks')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" value="{{ old("kelas") ?? $krs->kelas}}" class="form-control @error('kelas') is-invalid @enderror" />
                            @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    <a href="{{route("admin.jadwal")}}"  class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")

@endsection
