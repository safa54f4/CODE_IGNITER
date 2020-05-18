<?php

namespace App;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class krs extends Model
{
    protected $table = "krs";
    public $namahari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
    public function getHari($id)
    {
        return $this->namahari[$id];
    }

    public function getDiffHour($start, $end)
    {
        $starthour = Carbon::createFromFormat("H:s", $start);
        $endhour = Carbon::createFromFormat("H:s", $end);

        return $starthour->diffInRealHours($endhour);
    }
    public function kelas()
    {
        return $this->belongsTo("App\Kelas");
    }
}
