<?php

namespace App\Controllers;
use App\models\modelta;
class Ta extends BaseController
{

    private $modelta;
    public function __construct()
    {
        helper('form');
        $this->modelta = new modelta();
    }
    public function index()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'ta'    => $this->modelta->alldata(),
            'isi' => 'admin/v_ta'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = [
            'ta' => $this->request->getpost('ta'),
            'semester' => $this->request->getpost('semester'),
        ];
        $this->modelta->add($data);
        session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
        return redirect()->to(base_url('ta'));
    }

    public function edit($id_ta)
    {
        $data = [
            'id_ta'=> $id_ta,
            'ta' => $this->request->getpost('ta'),
            'semester' => $this->request->getpost('semester'),
        ];
        $this->modelta->edit($data);
        session()->setFlashdata('pesan','Data berhasil di edit!..');
        return redirect()->to(base_url('ta'));
    }
    public function delete($id_ta)
    {
        $data = [
            'id_ta'=> $id_ta,
        ];
        $this->modelta->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('ta'));
    }
    //setting tahun akademik
    public function setting()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'ta'    => $this->modelta->alldata(),
            'isi' => 'admin/v_set_ta'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function set_status_ta($id_ta)
    {
        //reset status ta
        $this->modelta->reset_status_ta();
        //set status ta
        $data = [
            'id_ta' => $id_ta,
            'status' => 1
        ];
        $this->modelta->edit ($data);
        session()->setFlashdata('pesan','Status tahun akademik berhasil di ubah!..');
        return redirect()->to(base_url('ta/setting'));
    }
    
}
