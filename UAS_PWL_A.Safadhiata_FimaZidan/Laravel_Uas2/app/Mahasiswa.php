<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    public $gender = [
        "Laki-laki", "Perempuan"
    ];
    public function getGender($id)
    {
        return $this->gender[$id];
    }
    public function kelas()
    {
        return $this->belongsTo("App\Kelas");
    }
}
