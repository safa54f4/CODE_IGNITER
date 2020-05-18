<?php

namespace App\Controllers;

use CodeIgniter\Controller;


class Mahasiswa extends Controller
{

    public function getToken()
    {
        $session = \Config\Services::session();
        if ($session->has("api_token")) {
            return $session->get("api_token");
        }
    }
    public function getData($token, $type = "")
    {
        $client = \Config\Services::curlrequest();
        $res = $client->request(
            "GET",
            "http://localhost:8000/api/mahasiswa/" . $type,
            [
                "headers" => [
                    "Accept" => "application/json",
                    "Authorization" => "Bearer " . $token
                ]
            ]
        );
        return json_decode($res->getBody());
    }
    public function index()
    {
        $token = $this->getToken();
        $data["data"] = $this->getData($token);
        $data["title"] = "Data Mahasiswa";
        echo view('layout/header', $data);
        echo view('mahasiswa/data', $data);
        echo view('layout/footer', $data);
    }
    public function krs()
    {
        $token = $this->getToken();
        $data["data"] = $this->getData($token);
        $data["krs"] = $this->getData($token, "krs");
        $data["title"] = "Kartu Rencana Mahasiswa";
        echo view('layout/header', $data);
        echo view('mahasiswa/krs', $data);
        echo view('layout/footer', $data);
    }
    public function jadwal()
    {
        $token = $this->getToken();
        $data["data"] = $this->getData($token);
        $data["jadwal"] = $this->getData($token, "jadwal");
        $data["title"] = "Jadwal Perkuliahan";
        echo view('layout/header', $data);
        echo view('mahasiswa/jadwal', $data);
        echo view('layout/footer', $data);
    }
}
