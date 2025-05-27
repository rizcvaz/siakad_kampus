<?php

namespace App\Controllers;
use App\Models\ModelKelas;
use App\Models\ModelDosen;
use App\Models\ModelProdi;
class Kelas extends BaseController
{
    private $ModelKelas;
    private $ModelDosen;
    private $ModelProdi;

    public function __construct() 
    {
      $this->ModelKelas= new ModelKelas();
      $this->ModelDosen= new ModelDosen();
      $this->ModelProdi= new ModelProdi();
      helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'Rombongan Kelas',
            'kelas' => $this->ModelKelas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'prodi' => $this->ModelProdi->allData(),
            'isi' => 'admin/kelas/v_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        if ($this->validate([
            'nama_kelas' =>[
                'label'=> 'Nama Kelas',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                    'id_prodi' =>[
                        'label'=> 'Program Studi',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'id_dosen' =>[
                            'label'=> 'Nama Dosen',
                            'rules'=> 'required',
                            'errors'=> [
                                'required' => '{field} wajib diisi !!!'
                            ]
                            ],
                            'tahun_angkatan' =>[
                                'label'=> 'Tahun Angkatan',
                                'rules'=> 'required',
                                'errors'=> [
                                    'required' => '{field} wajib diisi !!!'
                                ]
                                ],
            ])){
                //jika valid
                $data = [
                    'nama_kelas' => $this->request->getpost('nama_kelas'),
                    'id_prodi' => $this->request->getpost('id_prodi'),
                    'id_dosen' => $this->request->getpost('id_dosen'),
                    'tahun_angkatan' => $this->request->getpost('tahun_angkatan'),
                ];
                $this->ModelKelas->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('kelas'));
            }else{
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('kelas'));
            }
           
    }
    public function delete($id_kelas)
    {
        $data = [
            'id_kelas'=> $id_kelas,
        ];
        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('kelas'));
    }
    public function rincian_kelas($id_kelas)
    {
        $data = [
            'title' => 'Rombongan Kelas',
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'mhs'   => $this->ModelKelas->mahasiswa($id_kelas),
            'jml'   => $this->ModelKelas->jml_mhs($id_kelas),
            'mhs_tpk'=>$this->ModelKelas->mhs_tdk_ada_kelas(),
            'isi' => 'admin/kelas/v_rincian_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add_anggota_kelas($id_mhs, $id_kelas)
    {
        $data = [
            'id_mhs'=> $id_mhs,
            'id_kelas' => $id_kelas
        ];
        $this->ModelKelas->update_mhs($data);
        session()->setFlashdata('pesan','Mahasiswa berhasil ditambahkan ke kelas!..');
        return redirect()->to(base_url('kelas/rincian_kelas/'. $id_kelas));
    }
    public function remove_anggota_kelas($id_mhs, $id_kelas)
    {
        $data = [
            'id_mhs'=> $id_mhs,
            'id_kelas' => null
        ];
        $this->ModelKelas->update_mhs($data);
        session()->setFlashdata('pesan','Mahasiswa berhasil dihapus dari kelas!..');
        return redirect()->to(base_url('kelas/rincian_kelas/'. $id_kelas));
    }
}