<?php

namespace App\Controllers;

use App\Models\modelmatkul;
use App\Models\modelprodi;

class Matkul extends BaseController
{
    private $modelmatkul;
    private $modelprodi;

    public function __construct()
    {
        helper('form');
       $this->modelmatkul = new modelmatkul();
       $this->modelprodi = new modelprodi();
    }
    public function index()
    {
        $data = [
            'title'    => 'Mata Kuliah',
            'prodi' => $this->modelprodi->allData(),
            'isi'      => 'admin/matkul/v_matkul'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function detail($id_prodi)
    {
        $data = [
            'title'    => 'Mata Kuliah',
            'prodi' => $this->modelprodi->detail_Data($id_prodi),
            'matkul' => $this->modelmatkul->AllDatamatkul($id_prodi),
            'isi'      => 'admin/matkul/v_detail'
        ];
        return view('layout/v_wrapper', $data);
    }
        
   
    public function add($id_prodi)
    {
        if ($this->validate([
                'kode_matkul' =>[
                    'label'=> 'Kode Mata Kuliah',
                    'rules'=> 'required|is_unique[tbl_matkul.kode_matkul]',
                    'errors'=> [
                        'required' => '{field} wajib diisi !!!',
                        'is_unique' => '{field} Sudah ada, input kode lain !!!'
                    ]
                    ],
                'matkul' =>[
                        'label'=> 'Mata Kuliah',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                'sks' =>[
                        'label'=> 'SKS',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'smt' =>[
                            'label'=> 'Semester',
                            'rules'=> 'required',
                            'errors'=> [
                                'required' => '{field} wajib diisi !!!'
                            ]
                            ],
                            'kategori' =>[
                                'label'=> 'Kategori',
                                'rules'=> 'required',
                                'errors'=> [
                                    'required' => '{field} wajib diisi !!!'
                                ]
                                ],
            ])){
                 //jika valid
                 $smt = $this->request->getpost('smt');
                 if ($smt==1 || $smt==3 || $smt==5 || $smt==7){
                    $semester = 'Ganjil';
                 }else {
                    $semester = 'Genap';
                 }
                 $data = [
                    'kode_matkul' => $this->request->getpost('kode_matkul'),
                    'matkul' => $this->request->getpost('matkul'),
                    'sks' => $this->request->getpost('sks'),
                    'smt' => $this->request->getpost('smt'),
                    'semester' => $semester,
                    'kategori' => $this->request->getpost('kategori'),
                    'id_prodi' => $id_prodi,
                ];
                $this->modelmatkul->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('matkul/detail/'. $id_prodi));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('matkul/detail/'. $id_prodi));
            }
    }
    public function delete($id_prodi, $id_matkul)
    {
        $data = [
            'id_matkul'=> $id_matkul,
        ];
        $this->modelmatkul->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('matkul/detail/'. $id_prodi));
    }

}