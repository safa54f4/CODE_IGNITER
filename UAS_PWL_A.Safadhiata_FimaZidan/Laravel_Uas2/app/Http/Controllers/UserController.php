<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\krs;
use App\Level;
use App\Mahasiswa;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public $level = [
        [
            "id" => 1,
            "nama" => "Administrator",
            "is_admin" => true,
            "is_mahasiswa" => false
        ],
        [
            "id" => 2,
            "nama" => "Mahasiswa",
            "is_admin" => false,
            "is_mahasiswa" => true
        ],
    ];
    protected $gender = ["Laki-laki", "Perempuan"];
    protected function ambil_post($alamat, $data, $opt = false)
    {
        $client = new Client();
        $res = $client->request('POST', $alamat, [
            'form_params' => $data
        ]);
        if ($res->getStatusCode() == 200) { // 200 OK
            return json_decode($res->getBody()->getContents(), $opt);
        }
    }
    protected function ambil_get($alamat, $opt = false)
    {
        $client = new Client();
        $res = $client->request('GET', $alamat);
        if ($res->getStatusCode() == 200) { // 200 OK
            return json_decode($res->getBody()->getContents(), $opt);
        }
    }
    public function getUserInfo(Request $request)
    {
        // dd($request->all());

        $token = $request->session()->get("api_token");
        // dd($token);

        $data2 = $this->ambil_post("http://localhost:8080/api/auth/user", [
            "token" => $token
        ]);
        // dd($data2);
        $data = $data2;

        // $request->session()->put("api_token", $data2);
        // return $data2;
        // return dd($data2);
        return $data->data;
    }
    public function index(Request $request)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["users"] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/user")->data;
        $data["hasapi"] = $request->session()->has("api_token");
        return view("user.index", $data);
    }
    public function tambah(Request $request)
    {
        // abort_unless(Auth::user()->level->is_admin, 404);
        $data["hasapi"] = $request->session()->has("api_token");
        $data['datauser'] = $this->getUserInfo($request);
        // $mhs = new Mahasiswa();
        // $kelas = new Kelas();
        $data["gender"] = $this->gender;
        // $data["kelas"] = $kelas->all();
        $data['levels'] = $this->level;
        // dd($data);
        return view("user.tambah", $data);
    }
    public function add(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            "nama" => "required|string",
            "email" => "required|email",
            "password" => "required",
            "jabatan" => "required|integer",
            "kota_lahir" => "nullable|string|required_if:jabatan,2",
            "nik" => "nullable|integer|required_if:jabatan,2",
            "kelas" => "nullable|required_if:jabatan,2",
        ]);
        if ($request->jabatan == 2) {
            $datajson = [
                "nama" => $request->nama,
                "password" => $request->password,
                "level" => $request->jabatan,
                "email" => $request->email,
                "nik" => $request->nik,
                "kelas" => $request->kelas,
                "kota_lahir" => $request->kota_lahir,
            ];
        } else {
            $datajson = [
                "nama" => $request->nama,
                "password" => $request->password,
                "level" => $request->jabatan,
                "email" => $request->email,
            ];
        }
        $data = $this->ambil_post(env("CODEIGNITER_ADDRESS") . "/user/add/", $datajson);
        return redirect()->route("user.index");
    }
    public function edit(Request $request, $id)
    {
        // abort_unless(Auth::user()->level->is_admin, 404);
        $data['datauser'] = $this->getUserInfo($request);
        $data["users"] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/user")->data;
        $data["hasapi"] = $request->session()->has("api_token");
        $data['levels'] = $this->level;
        $data['userinfo'] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/user/" . $id, true)['data'];
        return view("user.edit", $data);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validate = $request->validate([
            "nama" => "required|string",
            "email" => "required|email",
            // "password" => "required",
            "jabatan" => "required|integer",
            "kota_lahir" => "nullable|string|required_if:jabatan,2",
            "nik" => "nullable|integer|required_if:jabatan,2",
            "kelas" => "nullable|required_if:jabatan,2",
        ]);
        if ($request->jabatan == 2) {
            $datajson = [
                "nama" => $request->nama,
                // "password" => $request->password,
                "level" => $request->jabatan,
                "email" => $request->email,
                "nik" => $request->nik,
                "kelas" => $request->kelas,
                "kota_lahir" => $request->kota_lahir,
            ];
        } else {
            $datajson = [
                "nama" => $request->nama,
                "password" => $request->password,
                "level" => $request->jabatan,
                "email" => $request->email,
            ];
        }
        $data = $this->ambil_post(env("CODEIGNITER_ADDRESS") . "/user/" . $id . "/update/", $datajson);
        return redirect()->route("user.index");

    }
    public function hapus(Request $request, $id)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["users"] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/user")->data;
        $data["hasapi"] = $request->session()->has("api_token");
        abort_unless(!empty($id), 404);
        // abort_unless(Auth::user()->level->is_admin, 404);
        $data['user'] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/user/" . $id, true)['data'];
        // dd($data['user']);
        // $data["user"] = User::find($id);
        return view("user.hapus", $data);
    }
    public function delete(Request $request, $id)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        abort_unless(!empty($id), 404);
        // abort_unless(Auth::user()->level->is_admin, 404);
        // $user = User::find($id);
        // $user->delete();
        $data = $this->ambil_post(env("CODEIGNITER_ADDRESS") . "/user/" . $id . "/delete/", []);
        return redirect()->route("user.index");
        // return redirect()->route("user.index");
    }
    public function semua_jadwal(Request $request)
    {
        // abort_unless$data['datauser'] = $this->getUserInfo($request);
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        $data['krs'] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/jadwal/")->data;
        // dd($data['krs']);
        // $['krs'] = krs::all();
        return view("jadwal.jadwal", $data);
    }
    public function tambah_jadwal(Request $request)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        // abort_unless(Auth::user()->level->is_admin, 404);
        // $data["kelas"] = Kelas::all();
        return view("jadwal.tambah", $data);
    }
    public function add_jadwal(Request $request)
    {
        // dd($request->all());
        // abort_unless(Auth::user()->level->is_admin, 404);
        $request->validate([
            "kode_mk" => "required",
            "mata_kuliah" => "required",
            "dosen" => "required",
            "jam" => "required",
            "hari" => "required",
            "semester" => "required|integer",
            "sks" => "required|integer",
            "kelas" => "required"
        ]);
        $datajson = [
            "kode_mk" => $request->kode_mk,
            "jam" => $request->jam,
            "hari" => $request->hari,
            "dosen" => $request->dosen,
            "semester" => $request->semester,
            "sks" => $request->sks,
            "kelas" => $request->kelas,
            "mata_kuliah" => $request->mata_kuliah,
        ];
        $data = $this->ambil_post(env("CODEIGNITER_ADDRESS") . "/jadwal/add", $datajson);
        return redirect()->route("admin.jadwal");
        // $krs = new krs();
        // $krs->kode_mk = $request->kode_mk;
        // $krs->mata_kuliah = $request->mata_kuliah;
        // $krs->dosen = $request->dosen;
        // $krs->pukul_awal = $request->pukul_awal;
        // $krs->pukul_akhir = $request->pukul_akhir;
        // $krs->hari = $request->hari;
        // $krs->semester = $request->semester;
        // $krs->sks = $request->sks;
        // $krs->kelas_id = $request->kelas;
        // if ($krs->save()) {
        //     return redirect()->route("admin.jadwal");
        // } else {
        //     return redirect()->route("admin.jadwal");
        // }
    }
    public function edit_jadwal(Request $request, $id)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        $data['krs'] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/jadwal/" . $id)->data;
        // abort_unless(Auth::user()->level->is_admin, 404);
        // $data["kelas"] = Kelas::all();
        // dd($data['krs']);    
        return view("jadwal.edit", $data);
    }
    public function update_jadwal(Request $request, $id)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        // dd($request->all());
        // abort_unless(Auth::user()->level->is_admin, 404);
        $request->validate([
            "kode_mk" => "required",
            "mata_kuliah" => "required",
            "dosen" => "required",
            "jam" => "required",
            "hari" => "required",
            "semester" => "required|integer",
            "sks" => "required|integer",
            "kelas" => "required"
        ]);
        $datajson = [
            "kode_mk" => $request->kode_mk,
            "jam" => $request->jam,
            "hari" => $request->hari,
            "dosen" => $request->dosen,
            "semester" => $request->semester,
            "sks" => $request->sks,
            "kelas" => $request->kelas,
            "mata_kuliah" => $request->mata_kuliah,
        ];
        $data = $this->ambil_post(env("CODEIGNITER_ADDRESS") . "/jadwal/" . $id . "/update", $datajson);
        return redirect()->route("admin.jadwal");
        // $request->validate([
        //     "kode_mk" => "required",
        //     "mata_kuliah" => "required",
        //     "dosen" => "required",
        //     "pukul_awal" => "required|date_format:H:i",
        //     "pukul_akhir" => "required|date_format:H:i",
        //     "hari" => "required",
        //     "semester" => "required|integer",
        //     "sks" => "required|integer",
        //     "kelas" => "required|integer"
        // ]);
        // $krs = krs::find($id);
        // $krs->kode_mk = $request->kode_mk;
        // $krs->mata_kuliah = $request->mata_kuliah;
        // $krs->dosen = $request->dosen;
        // $krs->pukul_awal = $request->pukul_awal;
        // $krs->pukul_akhir = $request->pukul_akhir;
        // $krs->hari = $request->hari;
        // $krs->semester = $request->semester;
        // $krs->sks = $request->sks;
        // $krs->kelas_id = $request->kelas;
        // if ($krs->save()) {
        //     return redirect()->route("admin.jadwal");
        // } else {
        //     return redirect()->route("admin.jadwal");
        // }
    }
    public function hapus_jadwal(Request $request, $id)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        // $krs = new krs();
        $data['krs'] = $this->ambil_get(env("CODEIGNITER_ADDRESS") . "/jadwal/" . $id)->data;
        // $data["krs"] = krs::findOrFail($id);
        return view("jadwal.hapus", $data);
    }
    public function delete_jadwal(Request $request, $id)
    {
        $data['datauser'] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        $data = $this->ambil_post(env("CODEIGNITER_ADDRESS") . "/jadwal/" . $id . "/delete", []);
        return redirect()->route("admin.jadwal");
    }
    public function welcome_home(Request $request) {
        $data["hasapi"] = $request->session()->has("api_token");
        if ($data["hasapi"]) {
            $data['datauser'] = $this->getUserInfo($request);

        }
        return view('welcome', $data);
    }
    public function mahasiswa_index(Request $request)
    {
        // abort_unless(Auth::user()->level->is_mahasiswa, 404);
        $data['datauser'] = $this->getUserInfo($request);
        $data["userinfo"] = $this->getUserInfo($request);
        $data["hasapi"] = $request->session()->has("api_token");
        // $data["mahasiswa"] = new Mahasiswa();
        // dd($data["userinfo"]);
        return view('mahasiswa.index', $data);
    }
}
