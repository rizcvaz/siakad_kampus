<?php

namespace App\Controllers;

use App\Models\modeluser;

class user extends BaseController
{

    private $modeluser;
    public function __construct()
    {
        helper('form');
       $this->modeluser = new modeluser();
    
    }
    public function index()
    {
        $data = [
            'title'    => 'User',
            'user' => $this->modeluser->allData(),
            'isi'      => 'admin/v_user'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_user' =>[
                'label'=> 'Nama User',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                'username' =>[
                    'label'=> 'username',
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => '{field} wajib diisi !!!',
                        
                    ]
                    ],
                    'password' =>[
                        'label'=> 'Password',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'foto' =>[
                            'label'=> 'Foto',
                            'rules'=> 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                            'errors'=> [
                                'uploaded' => '{field} wajib diisi !!!',
                                'max_size' => '{field} max 1024 KB!!!',
                                'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO!!!',
                            ]
                            ],
            ])){
                
                //mengambil file foto dari form input
                $foto = $this->request->getFile('foto');
                //merename file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array (
                    'nama_user'=> $this->request->getPost('nama_user'),
                    'username'=> $this->request->getPost('username'),
                    'password'=> $this->request->getPost('password'),
                    'foto'=> $nama_file,
                 );
                 //memindahkan file foto dari form input ke folder di directory
                $foto->move('foto', $nama_file);
                $this->modeluser->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('user'));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('user'));
            }

    }

    public function edit($id_user)
    {
        if ($this->validate([
            'nama_user' =>[
                'label'=> 'Nama User',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                'username' =>[
                    'label'=> 'username',
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => '{field} wajib diisi !!!',
                        
                    ]
                    ],
                    'password' =>[
                        'label'=> 'Password',
                        'rules'=> 'required',
                        'errors'=> [
                            'required' => '{field} wajib diisi !!!'
                        ]
                        ],
                        'foto' =>[
                            'label'=> 'Foto',
                            'rules'=> 'max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                            'errors'=> [
                                'max_size' => '{field} max 1024 KB!!!',
                                'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO!!!',
                            ]
                            ],
            ])){
                
                //mengambil file foto dari form input
                $foto = $this->request->getFile('foto');

                if ($foto->getError()== 4){
                    $data = array (
                        'id_user'=> $id_user,
                        'nama_user'=> $this->request->getPost('nama_user'),
                        'username'=> $this->request->getPost('username'),
                        'password'=> $this->request->getPost('password'),
                     );
                     $this->modeluser->edit($data);
                }else {
                    //menghapus foto lama
                    $user = $this->modeluser->detail_data($id_user);
                    if ($user['foto'] != "") {
                        unlink('foto/'.$user['foto']);
                    }
                     //merename file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array (
                    'id_user'=> $id_user,
                    'nama_user'=> $this->request->getPost('nama_user'),
                    'username'=> $this->request->getPost('username'),
                    'password'=> $this->request->getPost('password'),
                    'foto'=> $nama_file,
                 );
                 //memindahkan file foto dari form input ke folder di directory
                $foto->move('foto', $nama_file);
                $this->modeluser->edit($data);
                }
                session()->setFlashdata('pesan','Data berhasil di ubah!..');
                return redirect()->to(base_url('user'));
            }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('user'));
            }

    }

    public function delete($id_user)
    {
        $user = $this->modeluser->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('foto/'.$user['foto']);
        }
        $data = [
            'id_user'=> $id_user,
        ];
        $this->modeluser->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('user'));
    }
   
}

