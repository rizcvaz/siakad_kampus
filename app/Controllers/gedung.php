<?php

namespace App\Controllers;

use App\Models\modelgedung;

class gedung extends BaseController
{
    private $modelgedung;
    public function __construct()
    {
        helper('form');
       $this->modelgedung = new modelgedung();
    }
    public function index()
    {
        $data = [
            'title'    => 'Gedung',
            'gedung' => $this->modelgedung->allData(),
            'isi'      => 'admin/v_gedung'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = [
            'gedung' => $this->request->getpost('gedung'),
        ];
        $this->modelgedung->add($data);
        session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
        return redirect()->to(base_url('gedung'));
    }
    public function edit($id_gedung)
    {
        $data = [
            'id_gedung'=> $id_gedung,
            'gedung' => $this->request->getpost('gedung'),
        ];
        $this->modelgedung->edit($data);
        session()->setFlashdata('pesan','Data berhasil di update!..');
        return redirect()->to(base_url('gedung'));
    }
    public function delete($id_gedung)
    {
        $data = [
            'id_gedung'=> $id_gedung,
        ];
        $this->modelgedung->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('gedung'));
    }
}