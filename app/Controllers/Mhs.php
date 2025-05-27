<?php

namespace App\Controllers;
use App\Models\Modelta;
use App\Models\ModelKrs;

class Mhs extends BaseController
{
    private $Modelta;
    private $ModelKrs;
    public function __construct() 
    {
        $this->Modelta = new Modelta();
        $this->ModelKrs = new ModelKrs();

    }
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard',
            'mhs' => $this->ModelKrs->DataMhs(),
            "ta" => $this->Modelta->ta_aktif(),
            'isi' => 'v_dashboard_mhs'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi()
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Absensi',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'mhs'   => $this->ModelKrs->DataMhs(),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'],$ta['id_ta']),
            'isi' => 'mhs/v_absensi'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function khs()
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'mhs'   => $this->ModelKrs->DataMhs(),
        'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan ($ta['id_ta'], $mhs['id_prodi']),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'],$ta['id_ta']),
            'isi' => 'mhs/v_khs'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function print_khs()
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'mhs'   => $this->ModelKrs->DataMhs(),
        'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan ($ta['id_ta'], $mhs['id_prodi']),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'],$ta['id_ta']),
        ];
        return view('mhs/v_print_khs', $data);
    }
}