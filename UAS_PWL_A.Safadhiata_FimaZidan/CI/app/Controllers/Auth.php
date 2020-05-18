<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Session\Session;

class Auth extends Controller
{

    protected function login_from_api($email, $password)
    {
        $client = \Config\Services::curlrequest();
        $res = $client->request(
            "POST",
            "http://localhost:8000/api/login",
            [
                "form_params" => [
                    "email" => $email,
                    "password" => $password
                ]
            ]
        );
        $body = $res->getBody();

        return $res->getBody();
    }
    public function index()
    {
        return redirect()->to("/auth/login");
    }
    public function login()
    {
        $data["title"] = "Login";
        echo view('layout/header', $data);
        echo view('auth/login', $data);
        echo view('layout/footer', $data);
    }
    public function process()
    {
        helper(['form', 'url']);
        $session = \Config\Services::session();
        // dd($this->request->getPost("email"));
        $validate = $this->validate([
            "email" => "required|valid_email",
            "password" => "required"
        ]);
        if ($session->has("api_token")) {
            return redirect()->to("/mahasiswa");
        }
        if ($validate) {
            // $auth = new Auth();
            $data = $this->login_from_api($this->request->getPost("email"), $this->request->getPost("password"));
            if (!isset(json_decode($data)->errors)) {
                $api_token = json_decode($data)->data->api_token;
                $session->set("api_token", $api_token);
                return redirect()->to("/mahasiswa");
            } else {
                return redirect()->to("/auth/login");
            }
        } else {
            $data["title"] = "Login";
            echo view('layout/header', $data);
            echo view('auth/login', $data);
            echo view('layout/footer', $data);
        }
    }
    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to("/auth/login");
    }
}
