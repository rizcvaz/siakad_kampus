<?php

namespace App\Controllers;

use App\Models\modelruangan;
use App\Models\modelgedung;

class ruangan extends BaseController
{
    private $modelruangan;
    private $modelgedung;
    
    public function __construct()
    {
        helper('form');
       $this->modelruangan = new modelruangan();
       $this->modelgedung = new modelgedung();
    }
    public function index()
    {
        $data = [
            'title'    => 'Ruangan',
            'ruangan' => $this->modelruangan->allData(),
            'isi'      => 'admin/ruangan/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = [
            'title'    => 'Add Ruangan',
            'gedung' => $this->modelgedung->allData(),
            'isi'      => 'admin/ruangan/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'id_gedung' =>[
                'label'=> 'Gedung',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
            ])){
                //jika valid
                $data = [
                    'id_gedung' => $this->request->getpost('id_gedung'),
                    'ruangan' => $this->request->getpost('ruangan'),
                ];
                $this->modelruangan->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('ruangan'));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('ruangan/add'));
            }
    }

    public function edit($id_ruangan)
    {
        $data = [
            'title'    => 'Edit Ruangan',
            'gedung' => $this->modelgedung->allData(),
            'ruangan' => $this->modelruangan->detail_Data($id_ruangan),
            'isi'      => 'admin/ruangan/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_ruangan)
    {
        if ($this->validate([
            'id_gedung' =>[
                'label'=> 'Gedung',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
            ])){
                //jika valid
                $data = [
                    'id_ruangan' => $id_ruangan,
                    'id_gedung' => $this->request->getpost('id_gedung'),
                    'ruangan' => $this->request->getpost('ruangan'),
                ];
                $this->modelruangan->edit($data);
                session()->setFlashdata('pesan','Data berhasil di update!..');
                return redirect()->to(base_url('ruangan'));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('ruangan/edit/' . $id_ruangan));
            }
    }

    public function delete($id_ruangan)
    {
        $data = [
            'id_ruangan'=> $id_ruangan,
        ];
        $this->modelruangan->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('ruangan'));
    }
}

