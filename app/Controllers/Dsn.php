<?php

namespace App\Controllers;
use App\Models\ModelDsn;
use App\Models\Modelta;

class Dsn extends BaseController
{
    private $ModelDsn;
    private $Modelta;

    public function __construct() 
    {
        $this->ModelDsn = new ModelDsn();
        $this->Modelta = new Modelta();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Dosen',
            'dosen' => $this->ModelDsn->DataDosen(),
            'ta' => $this->Modelta->ta_aktif(),
            'isi' => 'v_dashboard_dsn'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function jadwal()
    {
        $ta = $this->Modelta->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Jadwal Mengajar',
            'ta'    => $ta,
            'jadwal'=> $this->ModelDsn->JadwalDosen($dosen['id_dosen'],$ta['id_ta']),
            'isi' => 'dosen/v_jadwal'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function AbsenKelas()
    {
        $ta = $this->Modelta->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Absen Kelas',
            'ta'    => $ta,
            'absen'=> $this->ModelDsn->JadwalDosen($dosen['id_dosen'],$ta['id_ta']),
            'isi' => 'dosen/absenkelas/v_absenkelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi($id_jadwal)
    {
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Absensi',
            'ta'    => $ta,
            'jadwal'=> $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs' => $this->ModelDsn->mhs($id_jadwal),
            'isi' => 'dosen/absenkelas/v_absensi'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function SimpanAbsen($id_jadwal)
    {
       $mhs = $this->ModelDsn->mhs($id_jadwal);
       foreach ($mhs as $key => $value) {
            $data = [
                'id_krs' => $this->request->getpost($value['id_krs'].'id_krs'),
                'P1' => $this->request->getpost($value['id_krs'].'p1'),
                'P2' => $this->request->getpost($value['id_krs'].'p2'),
                'P3' => $this->request->getpost($value['id_krs'].'p3'),
                'P4' => $this->request->getpost($value['id_krs'].'p4'),
                'P5' => $this->request->getpost($value['id_krs'].'p5'),
                'P6' => $this->request->getpost($value['id_krs'].'p6'),
                'P7' => $this->request->getpost($value['id_krs'].'p7'),
                'P8' => $this->request->getpost($value['id_krs'].'p8'),
                'P9' => $this->request->getpost($value['id_krs'].'p9'),
                'P10' => $this->request->getpost($value['id_krs'].'p10'),
                'P11' => $this->request->getpost($value['id_krs'].'p11'),
                'P12' => $this->request->getpost($value['id_krs'].'p12'),
                'P13' => $this->request->getpost($value['id_krs'].'p13'),
                'P14' => $this->request->getpost($value['id_krs'].'p14'),
                'P15' => $this->request->getpost($value['id_krs'].'p15'),
                'P16' => $this->request->getpost($value['id_krs'].'p16'),
                'P17' => $this->request->getpost($value['id_krs'].'p17'),
                'P18' => $this->request->getpost($value['id_krs'].'p18'),
            ];
            $this->ModelDsn-> SimpanAbsen($data);
       } 
       session()->setFlashdata('pesan','Absensi berhasil di update!..');
       return redirect()->to(base_url('dsn/absensi/'.$id_jadwal));
    }

    public function print_absensi($id_jadwal)
    {
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Print Absensi',
            'ta'    => $ta,
            'jadwal'=> $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs' => $this->ModelDsn->mhs($id_jadwal),
            
        ];
        return view('dosen/absenkelas/v_print_absensi', $data);
    }
    public function NilaiMahasiswa()
    {
        $ta = $this->Modelta->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Nilai Mahasiswa',
            'ta'    => $ta,
            'absen'=> $this->ModelDsn->JadwalDosen($dosen['id_dosen'],$ta['id_ta']),
            'isi' => 'dosen/nilai/v_nilaimahasiswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function DataNilai($id_jadwal)
    {
    $ta = $this->Modelta->ta_aktif();
    $data = [
        'title' => 'Nilai',
        'ta'    => $ta,
        'jadwal'=> $this->ModelDsn->DetailJadwal($id_jadwal),
        'mhs' => $this->ModelDsn->mhs($id_jadwal),
        'isi' => 'dosen/nilai/v_datanilai'
    ];
    return view('layout/v_wrapper', $data);
    }

    public function SimpanNilai($id_jadwal)
    {
        
       $mhs = $this->ModelDsn->mhs($id_jadwal);
       foreach ($mhs as $key => $value) {
        $absen = $this->request->getpost($value['id_krs'].'absen');
        $tugas = $this->request->getpost($value['id_krs'].'nilai_tugas');
        $uts = $this->request->getpost($value['id_krs'].'nilai_uts');
        $uas = $this->request->getpost($value['id_krs'].'nilai_uas');
        $na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
        if ($na >= 85) {
            $nh = 'A';
            $bobot = 4;
        } elseif ($na < 85 && $na >= 75) {
            $nh = 'B';
            $bobot = 3;
        } elseif ($na < 75 && $na >= 65) {
            $nh = 'C';
            $bobot = 2;
        } elseif ($na < 65 && $na >= 55) {
            $nh = 'D';
            $bobot = 1;
        } else {
            $nh = 'E';
            $bobot = 0;
        }
            $data = [
                'id_krs' => $this->request->getpost($value['id_krs'].'id_krs'),
                'nilai_tugas' => $this->request->getpost($value['id_krs'].'nilai_tugas'),
                'nilai_uts' => $this->request->getpost($value['id_krs'].'nilai_uts'),
                'nilai_uas' => $this->request->getpost($value['id_krs'].'nilai_uas'),
                'nilai_akhir' => number_format($na, 0),
                'nilai_huruf' => $nh,
                'bobot' => $bobot,
                
            ];
            $this->ModelDsn-> SimpanNilai($data);
       } 
       session()->setFlashdata('pesan','Nilai berhasil di update!..');
       return redirect()->to(base_url('dsn/DataNilai/'.$id_jadwal));
    }
    public function PrintNilai($id_jadwal)
    {
        $ta = $this->Modelta->ta_aktif();
        $data = [
            'title' => 'Rekap Nilai Mahasiswa',
            'ta'    => $ta,
            'jadwal' =>  $this->ModelDsn->DetailJadwal($id_jadwal), 
            'mhs' => $this->ModelDsn->mhs($id_jadwal), 
        ];
        return view('dosen/nilai/v_printnilai', $data);
    }

}