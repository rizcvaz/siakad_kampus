<?php

namespace App\Controllers;
use App\Models\Modelta;
use App\Models\ModelKrs;

class Krs extends BaseController
{
    private $Modelta;
    private $ModelKrs;

    public function __construct() 
    {
        $this->Modelta = new Modelta();
        $this->ModelKrs = new ModelKrs();

    }
    public function index()
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Kartu Rencana Studi (KRS)',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'mhs'   => $this->ModelKrs->DataMhs(),
        'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan ($ta['id_ta'], $mhs['id_prodi']),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'],$ta['id_ta']),
            'isi' => 'mhs/krs/v_krs'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function tambah_matkul($id_jadwal)
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'id_jadwal' => $id_jadwal,
            'id_ta'     => $ta['id_ta'],
            'id_mhs'    => $mhs['id_mhs']
        ];
        $this->ModelKrs->TambahMatkul($data);
        session()->setFlashdata('pesan','Mata Kuliah berhasil di tambahkan!..');
        return redirect()->to(base_url('krs'));
    }
    public function delete($id_krs)
    {
        $data = [
            'id_krs' => $id_krs,
    ];
    $this->ModelKrs->delete_data($data);
    session()->setFlashdata('pesan','data KRS berhasil di hapus!..');
        return redirect()->to(base_url('krs'));
    }
    public function print()
    {
        $mhs = $this->ModelKrs->DataMhs();
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'print_KRS',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'mhs'   => $this->ModelKrs->DataMhs(),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'],$ta['id_ta']),
        ];
    return view('mhs/krs/v_print_krs', $data);
    }
}