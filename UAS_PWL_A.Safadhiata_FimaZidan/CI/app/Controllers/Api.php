<?php

namespace App\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Api extends Controller
{
    use ResponseTrait;
    public function index()
    {
        $array = [
            "/api",
            "/api/user",
            "/api/mahasiswa",
            "/api/mahasiswa/krs",
            "/api/mahasiswa/jadwal",
        ];

        return $this->respond([
            "status" => 200,
            "data" => $array
        ]);
    }
    public function listUser($id = false)
    {
        $user = new User();
        if ($id == false) {
            return $this->respond(["status" => 200, "data" => $user->user()], 200);
        } else {
            return $this->respond(["status" => 200, "data" => $user->user($id)], 200);
        }
    }
    public function deleteUser($id)
    {
        $user = new User();
        $delete = $user->deleteUser($id);

        return $delete;
    }
    public function addUser()
    {
        $user = new User();
        $nama = $this->request->getVar("nama");
        $password = $this->request->getVar("password");
        $level = $this->request->getVar("level");
        $email = $this->request->getVar("email");
        if ($this->request->getVar("level") == 2) {
            $nik = $this->request->getVar("nik");
            $kelas = $this->request->getVar("kelas");
            $kotalahir = $this->request->getVar("kota_lahir");
            $create = $user->addUser($nama, $email, $password, $level, $nik, $kelas, $kotalahir);
        } else {
            $create = $user->addUser($nama, $email, $password, $level, null, null, null);
        }
        return $this->respond([
            "status" => 200,
            "data" => $create
        ]);
    }
    public function updateUser($id)
    {
        $user = new User();
        $nama = $this->request->getVar("nama");
        if (!empty($this->request->getVar("password")) && $this->request->getVar("password") != null) {
            $password = $this->request->getVar("password");
        } else {
            $password = null;
        }
        $level = $this->request->getVar("level");
        $email = $this->request->getVar("email");
        if ($this->request->getVar("level") == 2) {
            $nik = $this->request->getVar("nik");
            $kelas = $this->request->getVar("kelas");
            $kotalahir = $this->request->getVar("kota_lahir");
            $create = $user->updateUser($nama, $email, $password, $level, $nik, $kelas, $kotalahir, $id);
        } else {
            $create = $user->updateUser($nama, $email, $password, $level, null, null, null, $id);
        }
        return $this->respond([
            "status" => 200,
            "data" => $create
        ]);
    }
    public function mahasiswaOne()
    {
        if ($this->request->getVar("token") != null && !empty($this->request->getVar("token"))) {
            $mhs = new Mahasiswa();
            return $this->respond([
                "status" => 200,
                "data" => $mhs->mahasiswaOne($this->request->getVar("token"))
            ]);
        } else {
            return $this->respond([
                "status" => 404,
                "errors" => "No token selected"
            ]);
        }
    }
    public function loginAttempt()
    {
        helper(["form"]);
        $email = $this->request->getVar("email");
        $password = $this->request->getVar("password");
        $auth = new User();
        $authh = $auth->loginAttempt($email, $password);
        if ($authh) {
            return $this->respond(["status" => 200, "data" => ["api_token" => $authh]], 200);
        } else {
            return ["status" => 404, "errors" => "Authorization failed"];
        }
    }
    public function getInfoFromToken()
    {
        if ($this->request->getVar("token") != null && !empty($this->request->getVar("token"))) {
            $mhs = new User();
            return $this->respond([
                "status" => 200,
                "data" => $mhs->getUserInfoFromToken($this->request->getVar("token"))
            ]);
        } else {
            return $this->respond([
                "status" => 404,
                "errors" => "No token selected"
            ]);
        }
    }
    public function jadwalList($id = false) {
        $user = new Mahasiswa();
        if ($id == false) {
            return $this->respond(["status" => 200, "data" => $user->jadwalList()], 200);
        } else {
            return $this->respond(["status" => 200, "data" => $user->jadwalList($id)], 200);
        }
    }
    public function deleteJadwal($id)
    {
        $user = new Mahasiswa();
        $delete = $user->deleteJadwal($id);

        return $delete;
    }
    public function addJadwal()
    {
        $kodemk =  $this->request->getVar("kode_mk");
        $jam =  $this->request->getVar("jam");
        $hari =  $this->request->getVar("hari");
        $dosen =  $this->request->getVar("dosen");
        $semester =  $this->request->getVar("semester");
        $sks =  $this->request->getVar("sks");
        $kelas =  $this->request->getVar("kelas");
        $matakuliah =  $this->request->getVar("mata_kuliah");
        $jadwal = new Mahasiswa();
        $create  = $jadwal->addJadwal($kodemk, $jam, $hari, $dosen, $semester, $sks, $kelas, $matakuliah);

        return $this->respond([
            "status" => 200,
            "data" => $create
        ]);
    }
    public function updateJadwal($id)
    {
        $kodemk =  $this->request->getVar("kode_mk");
        $jam =  $this->request->getVar("jam");
        $hari =  $this->request->getVar("hari");
        $dosen =  $this->request->getVar("dosen");
        $semester =  $this->request->getVar("semester");
        $sks =  $this->request->getVar("sks");
        $kelas =  $this->request->getVar("kelas");
        $matakuliah =  $this->request->getVar("mata_kuliah");
        $jadwal = new Mahasiswa();
        $create  = $jadwal->updateJadwal($kodemk, $jam, $hari, $dosen, $semester, $sks, $kelas, $matakuliah, $id);

        return $this->respond([
            "status" => 200,
            "data" => $create
        ]);
    }
}
