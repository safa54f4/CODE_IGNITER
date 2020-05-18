@extends('layouts.app')
<?php

?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    Selamat Datang di SIAKAD Polpolan
                </div>
                <div class="card-footer">
                    @if(!$hasapi)
                        <a href="{{route("api.login_form")}}" class="btn btn-primary">Login</a>
                    @else
                        @if ($datauser->level_id == 1)
                        <a href="{{route("user.index")}}" class="btn btn-primary">Home</a>
                        @elseif ($datauser->level_id == 2)
                        <a href="{{route("mahasiswa.index")}}" class="btn btn-primary">Home</a>
                        @endif
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection
