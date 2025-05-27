<?php

namespace App\Controllers;

use App\models\modelprodi;
use App\models\modelfakultas;
use App\models\ModelDosen;

class Prodi extends BaseController
{
    private $modelprodi;
    private $modelfakultas;
    private $ModelDosen;
    public function __construct() {

        helper('form');
       $this->modelprodi= new modelprodi();
       $this->modelfakultas= new modelfakultas();
       $this->ModelDosen= new ModelDosen();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Program Studi',
            'prodi' => $this->modelprodi->allData(),
            'isi' => 'admin/prodi/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'    => 'Add Program Studi',
            'fakultas' => $this->modelfakultas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'isi'      => 'admin/prodi/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function insert()
    {
        if ($this->validate([
            'id_fakultas' =>[
                'label'=> 'Fakultas',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                'kode_prodi' =>[
                    'label'=> 'Kode Program Studi',
                    'rules'=> 'required|is_unique[tbl_prodi.kode_prodi]',
                    'errors'=> [
                        'required' => '{field} wajib diisi !!!',
                        'is_unique' => '{field} Sudah ada, input kode lain !!!'
                    ]
                    ],
                    'prodi' =>[
                        'label'=> 'Program Studi',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'jenjang' =>[
                            'label'=> 'Jenjang',
                            'rules'=> 'required',
                            'errors'=> [
                                'required' => '{field} wajib diisi !!!'
                            ]
                            ],
                            'ka_prodi' =>[
                                'label'=> 'Ka Prodi',
                                'rules'=> 'required',
                                'errors'=> [
                                    'required' => '{field} wajib diisi !!!'
                                ]
                                ],
            ])){
                //jika valid
                $data = [
                    'id_fakultas' => $this->request->getpost('id_fakultas'),
                    'kode_prodi' => $this->request->getpost('kode_prodi'),
                    'prodi' => $this->request->getpost('prodi'),
                    'jenjang' => $this->request->getpost('jenjang'),
                    'ka_prodi' => $this->request->getpost('ka_prodi'),
                ];
                $this->modelprodi->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('prodi'));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('prodi/add'));
            }
    }

    public function edit($id_prodi)
    {
        $data = [
            'title'    => 'Edit Program Studi',
            'fakultas' => $this->modelfakultas->allData(),
            'prodi'    => $this->modelprodi->detail_data($id_prodi),
            'dosen' => $this->ModelDosen->allData(),
            'isi'      => 'admin/prodi/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function update($id_prodi)
    {
        if ($this->validate([
            'id_fakultas' =>[
                'label'=> 'Fakultas',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                    'prodi' =>[
                        'label'=> 'Program Studi',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'jenjang' =>[
                            'label'=> 'Jenjang',
                            'rules'=> 'required',
                            'errors'=> [
                                'required' => '{field} wajib diisi !!!'
                            ]
                            ],
                            'ka_prodi' =>[
                                'label'=> 'Ka Prodi',
                                'rules'=> 'required',
                                'errors'=> [
                                    'required' => '{field} wajib diisi !!!'
                                ]
                                ],
            ])){
                //jika valid
                $data = [
                    'id_prodi' => $id_prodi,
                    'id_fakultas' => $this->request->getpost('id_fakultas'),
                    'prodi' => $this->request->getpost('prodi'),
                    'jenjang' => $this->request->getpost('jenjang'),
                    'ka_prodi' => $this->request->getpost('ka_prodi'),
                ];
                $this->modelprodi->edit($data);
                session()->setFlashdata('pesan','Data berhasil di update!..');
                return redirect()->to(base_url('prodi'));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('prodi/edit/' . $id_prodi));
            }
    }
    public function delete($id_prodi)
    {
        $data = [
            'id_prodi'=> $id_prodi,
        ];
        $this->modelprodi->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('prodi'));
    }
}