<?php

namespace App\Http\Controllers;

use App\krs;
use App\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        abort_unless(Auth::user()->level->is_mahasiswa, 404);
        $data["userinfo"] = Auth::user()->mahasiswa;
        $data["mahasiswa"] = new Mahasiswa();
        return view('mahasiswa.index', $data);
    }
    public function krs()
    {
        abort_unless(Auth::user()->level->is_mahasiswa, 404);
        // $krs = new krs();
        $data["krs"] = Auth::user()->mahasiswa->kelas->krs->unique("kode_mk");
        $data["time"] = new krs();
        // dd($data["krs"]);
        return view("mahasiswa.krs", $data);
    }
    public function jadwal()
    {
        abort_unless(Auth::user()->level->is_mahasiswa, 404);
        $data["jadwal"] = Auth::user()->mahasiswa->kelas->krs;
        return view("mahasiswa.jadwal", $data);
    }
}
