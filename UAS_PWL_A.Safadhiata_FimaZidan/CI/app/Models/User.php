<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected $table = "user";
    protected function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }

    // public function allUser()
    // {
    //     $query = $this->db->table($this->table)->get()->getResultArray();
    //     return $query;
    // }
    public function loginAttempt($email, $password)
    {
        $query = $this->db->table($this->table)->getWhere(["email" => $email])->getRow();
        if (password_verify($password, $query->password)) {
            return $query->api_token;
        } else {
            return false;
        }
    }
    public function userFromToken($token)
    {
        $query = $this->db->table($this->table)->getWhere(["api_token" => $token])->getRow();
        $level = $this->db->table("level")->getWhere(["id" => $query->level_id])->getRow();
        return [
            "email" => $query->email,
            "nama" => $query->nama,
            "level" => $level,
            "api_token" => $query->api_token
        ];
    }
    public function user($id = false)
    {
        if ($id == false) {
        $query = $this->db->table("user")->get()->getResultArray();
        } else {
        $query = $this->db->table("user")->getWhere(["id" => $id])->getRow();
        }
        return $query;
    }
    public function addUser($nama, $email, $password, $level, $nik = null, $kelas = null, $kotalahir = null)
    {
        helper('text');
        if ($level == 2) {
            $query = $this->db->table($this->table)->insert([
                "nama" => $nama,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "level_id" => $level,
                // "mahasiswa_id" => $this->db->insert_id(),
                "email" => $email,
                "nik" => $nik,
                "kelas" => $kelas,
                "kota_lahir" => $kotalahir,
                "api_token" => $this->generate_string("uiwefisdfksauhdfiw421445j23hj45234532jh45jh23", 32)
            ]);
        } else {
            $query = $this->db->table($this->table)->insert([
                "nama" => $nama,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "level_id" => $level,
                // "mahasiswa_id" => $mahasiswa_id,
                "email" => $email,
                "api_token" => $this->generate_string("uiwefisdfksauhdfiw421445j23hj45234532jh45jh23", 32)
            ]);
        }
        return $query;
    }
    public function updateUser($nama, $email, $password = null, $level, $nik = null, $kelas = null, $kotalahir = null, $id)
    {
        if ($level == 2) {
            if ($password == null) {
                $query = $this->db->table($this->table)->update([
                    "nama" => $nama,
                    // "password" => password_hash($password, PASSWORD_BCRYPT),
                    "level_id" => $level,
                    // "mahasiswa_id" => $this->db->insert_id(),
                    "email" => $email,
                    "nik" => $nik,
                    "kelas" => $kelas,
                    "kota_lahir" => $kotalahir,
                    // "api_token" => bin2hex(openssl_random_pseudo_bytes(32))
                ], ["id" => $id]);
            } else {
                $query = $this->db->table($this->table)->update([
                    "nama" => $nama,
                    "password" => password_hash($password, PASSWORD_BCRYPT),
                    "level_id" => $level,
                    // "mahasiswa_id" => $this->db->insert_id(),
                    "email" => $email,
                    "nik" => $nik,
                    "kelas" => $kelas,
                    "kota_lahir" => $kotalahir,
                    // "api_token" => bin2hex(openssl_random_pseudo_bytes(32))
                ], ["id" => $id]);
            }
        } else {
            if ($password == null) {
                $query = $this->db->table($this->table)->update([
                    "nama" => $nama,
                    // "password" => password_hash($password, PASSWORD_BCRYPT),
                    "level_id" => $level,
                    // "mahasiswa_id" => $mahasiswa_id,
                    "email" => $email,
                    // "api_token" => bin2hex(openssl_random_pseudo_bytes(32))
                ], ["id" => $id]);
            } else {
                $query = $this->db->table($this->table)->update([
                    "nama" => $nama,
                    "password" => password_hash($password, PASSWORD_BCRYPT),
                    "level_id" => $level,
                    // "mahasiswa_id" => $mahasiswa_id,
                    "email" => $email,
                    // "api_token" => bin2hex(openssl_random_pseudo_bytes(32))
                ], ["id" => $id]);
            }
        }
        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(["id" => $id]);
        return $query;
    }
    public function getPrivfromToken($token)
    {
        $query = $this->db->table("user")->getWhere(["api_token" => $token])->getRow();
        $level = $this->db->table("level")->getWhere(["id" => $query->level])->getRow();

        return $level;
    }
    public function getPrivfromId($id)
    {
        $query = $this->db->table("user")->getWhere(["api_token" => $id])->getRow();
        $level = $this->db->table("level")->getWhere(["id" => $query->level])->getRow();

        return $level;
    }
    public function getUserInfoFromToken($token)
    {
        $query = $this->db->table("user")->getWhere(["api_token" => $token])->getRow();
        return $query;
    }
}
