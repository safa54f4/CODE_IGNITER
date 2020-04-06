<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function index(){
        $nama ='A.SAFA DHIATA';
        $materi = ["Web Design", "Web Progamming", "Digital Marketing","graphic Design"];
        return view('biodata' , ['nama' => $nama, 'materi' =>
        $materi]);
    }
}
