<?php

namespace App\Controllers;
use App\Models\Modelta;
use App\Models\ModelProdi;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;

class JadwalKuliah extends BaseController
{
    private $Modelta;
    private $ModelProdi;
    private $ModelJadwalKuliah;
    private $ModelDosen;
    private $ModelRuangan;

    public function __construct() {
        helper('form');
       $this->Modelta = new Modelta();
       $this->ModelProdi = new ModelProdi();
       $this->ModelJadwalKuliah = new ModelJadwalKuliah();
       $this->ModelDosen = new ModelDosen();
       $this->ModelRuangan = new ModelRuangan();
       
       
    }
    public function index()
    {
        
        $data = [
            'title' => 'Jadwal Kuliah',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'prodi' => $this->ModelProdi->allData(),
            'isi' => 'admin/jadwalkuliah/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function detailjadwal($id_prodi)
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'ta_aktif' => $this->Modelta->ta_aktif(),
            'prodi' => $this->ModelProdi->detail_Data($id_prodi),
            'jadwal' => $this->ModelJadwalKuliah->allData($id_prodi),
            'matkul' => $this->ModelJadwalKuliah->matkul($id_prodi),
            'dosen' => $this->ModelDosen->allData(),
            'kelas' => $this->ModelJadwalKuliah->kelas($id_prodi),
            'ruangan' => $this->ModelRuangan->allData(),
            'isi' => 'admin/jadwalkuliah/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add($id_prodi)
    {
        if ($this->validate([
            'id_matkul' =>[
                'label'=> 'Mata Kuliah',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib dipilih !!!'
                ]
                ],
                'id_dosen' =>[
                    'label'=> 'Dosen',
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => '{field} wajib dipilih !!!',
                        
                    ]
                    ],
                    'id_kelas' =>[
                        'label'=> 'Kelas',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib dipilih !!!',
                            
                        ]
                        ],
                    'hari' =>[
                        'label'=> 'Hari',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'waktu' =>[
                            'label'=> 'Waktu',
                            'rules'=> 'required',
                            'errors'=> [
                                'required' => '{field} wajib dipilih !!!'
                            ]
                            ], 
                            'id_ruangan' =>[
                                'label'=> 'Ruangan',
                                'rules'=> 'required',
                                'errors'=> [
                                    'required' => '{field} wajib dipilih !!!'
                                ]
                                ], 
                                'quota' =>[
                                    'label'=> 'Quota',
                                    'rules'=> 'required',
                                    'errors'=> [
                                        'required' => '{field} wajib dipilih !!!'
                                    ]
                                    ], 
            ])){
                //jika valid
                $ta = $this->Modelta->ta_aktif();
                $data = [
                    'id_prodi' => $id_prodi,
                    'id_ta'    => $ta['id_ta'],
                    'id_kelas' => $this->request->getpost('id_kelas'),
                    'id_matkul' => $this->request->getpost('id_matkul'),
                    'id_dosen' => $this->request->getpost('id_dosen'),
                    'hari' => $this->request->getpost('hari'),
                    'waktu' => $this->request->getpost('waktu'),
                    'id_ruangan' => $this->request->getpost('id_ruangan'),
                    'quota' => $this->request->getpost('quota'),
                ];
                $this->ModelJadwalKuliah->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('jadwalkuliah/detailjadwal/'.$id_prodi));
            }else{
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('jadwalkuliah/detailjadwal/'.$id_prodi));
            
            }
    }
    public function delete($id_jadwal, $id_prodi)
    {
        $data = [
            'id_jadwal'=> $id_jadwal,
        ];
        $this->ModelJadwalKuliah->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('jadwalkuliah/detailjadwal/'.$id_prodi));
            
    }
}