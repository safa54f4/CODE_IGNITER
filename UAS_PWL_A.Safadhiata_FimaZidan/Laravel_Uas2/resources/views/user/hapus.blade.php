@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Hapus User {{$user['nama']}}
                </div>

                <div class="card-body">
                    Anda yakin menghapus user {{$user['nama']}}?
                </div>
                <div class="card-footer">
                    <form action="" method="POST">
                        @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="{{route("user.index")}}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
