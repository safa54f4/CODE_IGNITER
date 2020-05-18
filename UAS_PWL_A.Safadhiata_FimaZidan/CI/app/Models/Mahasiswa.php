<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    public function mahasiswaOne($token)
    {
        $fromuser = $this->db->table("user")->getWhere(["api_token" => $token])->getRow();
        // $query = $this->db->table($this->table)->getWhere(["id" => $fromuser->mahasiswa_id])->getRow();
        $level = $this->db->table("level")->getWhere(["id" => $fromuser->level_id])->getRow();

        return [
            "id" => $fromuser->id,
            "email" => $fromuser->email,
            "nama" => $fromuser->nama,
            "api_token" => $fromuser->api_token,
            "level" => $level,
            "nik" => $fromuser->nik,
            "kelas" => $fromuser->kelas,
            "kota_lahir" => $fromuser->kota_lahir
        ];
    }
    public function mahasiswaJadwal($token)
    {
        $fromuser = $this->db->table("user")->getWhere(["api_token" => $token])->getRow();
        // $querymhs = $this->db->table($this->table)->getWhere(["id" => $fromuser->mahasiswa_id])->getRow();
        $query = $this->db->table("jadwal")->getWhere(["kelas" => $fromuser->kelas])->getRowArray();


        $array = [];
        foreach ($query as $item) {
            $array_dump = [
                "id" => $item->id,
                "kode_mk" => $item->kode_mk,
                "jam" => $item->jam,
                "hari" => $item->hari,
                "dosen" => $item->dosen,
                "semester" => $item->dosen,
                "sks" => $item->sks,
                "kelas" => $item->kelas,
                "mata_kuliah" => $item->mata_kuliah,
            ];
            array_push($array, $array_dump);
        }
        return $array;
    }
    public function jadwalList($id = false)
    {
        if ($id == false) {
        $query = $this->db->table("jadwal")->get()->getResultArray();
        } else {
        $query = $this->db->table("jadwal")->getWhere(["id" => $id])->getRow();
        }
        return $query;
    }
    public function addJadwal($kodemk, $jam, $hari, $dosen, $semester, $sks, $kelas, $matakuliah) {
        $query = $this->db->table("jadwal")->insert([
            "kode_mk" => $kodemk,
            "jam" => $jam,
            "hari" => $hari,
            "dosen" => $dosen,
            "semester" => $semester,
            "sks" => $sks,
            "kelas" => $kelas,
            "mata_kuliah" => $matakuliah
        ]);

        return $query;
    }
    public function updateJadwal($kodemk, $jam, $hari, $dosen, $semester, $sks, $kelas, $matakuliah, $id) {
        $query = $this->db->table("jadwal")->update([
            "kode_mk" => $kodemk,
            "jam" => $jam,
            "hari" => $hari,
            "dosen" => $dosen,
            "semester" => $semester,
            "sks" => $sks,
            "kelas" => $kelas,
            "mata_kuliah" => $matakuliah
        ], ["id" => $id]);

        return $query;
    }
    public function deleteJadwal($id)
    {
        $query = $this->db->table("jadwal")->delete(["id" => $id]);
        return $query;
    }
}
