<?php

namespace App\Controllers;

use App\Controllers\Mahasiswa;

class Home extends BaseController
{
	public function index()
	{
		$mhs = new Mahasiswa();
		if ($mhs->getToken() != null) {
			$data["data"] = $mhs->getData($mhs->getToken());
		}
		$data["title"] = "Home";
		echo view('layout/header', $data);
		echo view('home', $data);
		echo view('layout/footer', $data);
	}

	//--------------------------------------------------------------------

}
