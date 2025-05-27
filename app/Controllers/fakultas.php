<?php

namespace App\Controllers;

use App\Models\modelfakultas;

class Fakultas extends BaseController
{
    private $modelfakultas;

    public function __construct()
    {
        helper('form');
       $this->modelfakultas = new modelfakultas();
    }
    public function index()
    {
        $data = [
            'title'    => 'Fakultas',
            'fakultas' => $this->modelfakultas->allData(),
            'isi'      => 'admin/v_fakultas'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = [
            'fakultas' => $this->request->getpost('fakultas'),
        ];
        $this->modelfakultas->add($data);
        session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
        return redirect()->to(base_url('fakultas'));
    }
    public function edit($id_fakultas)
    {
        $data = [
            'id_fakultas'=> $id_fakultas,
            'fakultas' => $this->request->getpost('fakultas'),
        ];
        $this->modelfakultas->edit($data);
        session()->setFlashdata('pesan','Data berhasil di update!..');
        return redirect()->to(base_url('fakultas'));
    }
    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas'=> $id_fakultas,
        ];
        $this->modelfakultas->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('fakultas'));
    }
}