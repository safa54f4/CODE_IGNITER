<?php

namespace App\Http\Controllers;

use App\krs;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    protected function ambil_post($alamat, $data)
    {
        $client = new Client();
        $res = $client->request('POST', $alamat, [
            'form_params' => $data
        ]);
        if ($res->getStatusCode() == 200) { // 200 OK
            return json_decode($res->getBody()->getContents());
        }
    }

    public function login_form(Request $request)
    {
        $hasapi = $request->session()->has("api_token");

        return view("http_auth.login", ["hasapi" => $hasapi]);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route("dari_ci");
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        // dd($request->all());

        $email = $request->email;
        $password = $request->password;

        $data = $this->ambil_post("http://localhost:8080/api/auth/login", [
            "email" => $email,
            "password" => $password,
        ]);
        // $data = $data2;
        // dd($data);

        // return $data2;
        // $datauser = $this->getUserInfo($request);

        $request->session()->put("api_token", $data->data->api_token);
        // return $data2;
        return redirect()->route("dari_ci");
    }
    public function index()
    {
        return view('home');
    }
    // public function index()
    // {
    //     $list = [
    //         "/mahasiswa",
    //         "/login"
    //     ];
    //     return response()->json($list);
    // }
    // public function login(Request $request)
    // {
    //     // var_dump($request->all());
    //     abort_if(empty($request->email), 404);
    //     abort_if(empty($request->password), 404);
    //     $email = $request->email;
    //     $password = $request->password;
    //     $user = User::where("email", $email)->first();
    //     if (!$user && $user->level->is_admin) {
    //         return response()->json(["status" => "404", "errors" => "User tidak ditemukan"]);
    //     }
    //     // dd($user);
    //     if (password_verify($password, $user->password) && !($user->level->is_admin)) {
    //         $data = [
    //             "api_token" => $user->api_token
    //         ];
    //     } else {
    //         return response()->json(["status" => "404", "errors" => "User tidak ditemukan"]);
    //         // $data = [
    //         //     "status" => "404",
    //         //     "messages" => "User tidak ditemukan"
    //         // ];
    //     }
    //     return response()->json(["status" => "200", "data" => $data]);
    // }

    public function jadwal(Request $request)
    {
        $datajson = [];
        $jadwal = $request->user()->mahasiswa->kelas->krs;
        $id = 1;
        foreach ($jadwal as $item) {
            $array = [
                "id" => $id,
                "hari" => $item->hari,
                "pukul_awal" => $item->pukul_awal,
                "pukul_akhir" => $item->pukul_akhir,
                "kode_mk" => $item->kode_mk,
                "mata_kuliah" => $item->mata_kuliah,
                "dosen" => $item->dosen
            ];
            array_push($datajson, $array);
            $id++;
        }
        return ["status" => "200", "data" => $datajson];
        // return $request->user()->mahasiswa->kelas->krs->unique("kode_mk");
    }
    public function krs(Request $request)
    {
        $datajson = [];
        $krs = $request->user()->mahasiswa->kelas->krs->unique("kode_mk");
        $time = new krs();
        $id = 1;
        foreach ($krs as $item) {
            $array = [
                "id" => $id,
                "kode_mk" => $item->kode_mk,
                "mata_kuliah" => $item->mata_kuliah,
                "semester" => $item->semester,
                "sks" => $item->sks,
                "time" => $time->getDiffHour($item->pukul_awal, $item->pukul_akhir)
            ];
            array_push($datajson, $array);
            $id++;
        }
        return ["status" => "200", "data" => $datajson];
    }
}
