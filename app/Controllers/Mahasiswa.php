<?php

namespace App\Controllers;
use App\Models\ModelMahasiswa;
use App\Models\Modelprodi;
class Mahasiswa extends BaseController
{
    private $ModelMahasiswa;
    private $Modelprodi;

    public function __construct() 
    {
        helper('form');
       $this->ModelMahasiswa = new ModelMahasiswa();
       $this->Modelprodi = new Modelprodi();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Mahasiswa',
            'mhs' => $this->ModelMahasiswa->allData(),
            'isi' => 'admin/mahasiswa/v_index'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function add()
    {
        $data = [
            'title' => 'Add Mahasiswa',
            'prodi' =>$this->Modelprodi->allData(),
            'isi' => 'admin/mahasiswa/v_add'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function insert()
    {
        if ($this->validate([
            'nim' =>[
                'label'=> 'nim',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                'nama_mhs' =>[
                    'label'=> 'Nama Mahasiswa',
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => '{field} wajib diisi !!!',
                        
                    ]
                    ],
                    'id_prodi' =>[
                        'label'=> 'Program Studi',
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
                        'foto_mhs' =>[
                            'label'=> 'Foto Mahasiswa',
                            'rules'=> 'uploaded[foto_mhs]|max_size[foto_mhs, 1024]|mime_in[foto_mhs,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                            'errors'=> [
                                'uploaded' => '{field} wajib diisi !!!',
                                'max_size' => '{field} max 1024 KB!!!',
                                'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO!!!',
                                
                            ]
                            ],
            ])){
                
                //mengambil file foto dari form input
                $foto = $this->request->getFile('foto_mhs');
                //merename file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                    $data = array (
                        'nim'=>  $this->request->getPost('nim'),
                        'nama_mhs'=> $this->request->getPost('nama_mhs'),
                        'id_prodi'=> $this->request->getPost('id_prodi'),
                        'password'=> $this->request->getPost('password'),
                        'foto_mhs'=> $nama_file,
                     );
                    //memindahkan file foto dari form input ke folder di directory
                $foto->move('fotomhs', $nama_file);
                $this->ModelMahasiswa->add($data);
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('mahasiswa'));
                }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('mahasiswa/add'));
                }
            
                
    }

    public function edit($id_mhs)
    {
        $data = [
            'title' => 'Edit Mahasiswa',
            'prodi' =>$this->Modelprodi->allData(),
            'mhs'   =>$this->ModelMahasiswa->detailData($id_mhs),
            'isi' => 'admin/mahasiswa/v_edit'
        ];
        return view('layout/v_wrapper', $data);
    }
    public function update($id_mhs)
    {
        if ($this->validate([
            'nim' =>[
                'label'=> 'nim',
                'rules'=> 'required',
                'errors'=> [
                    'required' => '{field} wajib diisi !!!'
                ]
                ],
                'nama_mhs' =>[
                    'label'=> 'Nama Mahasiswa',
                    'rules'=> 'required',
                    'errors'=> [
                        'required' => '{field} wajib diisi !!!',
                        
                    ]
                    ],
                    'id_prodi' =>[
                        'label'=> 'Program Studi',
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
                        'foto_mhs' =>[
                            'label'=> 'Foto Mahasiswa',
                            'rules'=> 'max_size[foto_mhs, 1024]|mime_in[foto_mhs,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                            'errors'=> [
                                'max_size' => '{field} max 1024 KB!!!',
                                'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO!!!',
                                
                            ]
                            ],
            ])){
                //mengambil file foto dari form input
                $foto = $this->request->getFile('foto_mhs');
                if ($foto->getError()== 4){
                    $data = array (
                        'id_mhs'=>$id_mhs,
                        'nim'=>  $this->request->getPost('nim'),
                        'nama_mhs'=> $this->request->getPost('nama_mhs'),
                        'id_prodi'=> $this->request->getPost('id_prodi'),
                        'password'=> $this->request->getPost('password'),
                     );
                     $this->ModelMahasiswa->edit($data);
                }else{
                     //menghapus foto lama
                     $mhs = $this->ModelMahasiswa->detailData($id_mhs);
                     if ($mhs['foto_mhs'] != "") {
                         unlink('fotomhs/'.$mhs['foto_mhs']);
                     }
                     //merename file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                    $data = array (
                        'id_mhs'=>$id_mhs,
                        'nim'=>  $this->request->getPost('nim'),
                        'nama_mhs'=> $this->request->getPost('nama_mhs'),
                        'id_prodi'=> $this->request->getPost('id_prodi'),
                        'password'=> $this->request->getPost('password'),
                        'foto_mhs'=> $nama_file,
                     );
                    //memindahkan file foto dari form input ke folder di directory
                $foto->move('fotomhs', $nama_file);
                $this->ModelMahasiswa->edit($data);
                }
                session()->setFlashdata('pesan','Data berhasil di tambahkan!..');
                return redirect()->to(base_url('mahasiswa'));
                }else {
                //jika tidak valid
                session()->setFlashdata('errors', \config\services::validation()->getErrors());
                return redirect()->to(base_url('mahasiswa/edit/'. $id_mhs));
                }
    }

    public function delete($id_mhs)
    {
        //menghapus foto lama
        $mhs = $this->ModelMahasiswa->detailData($id_mhs);
        if ($mhs['foto_mhs'] != "") {
            unlink('fotomhs/'.$mhs['foto_mhs']);
        }
        $data = [
            'id_mhs'=> $id_mhs,
        ];
        $this->ModelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan','Data berhasil di hapus!..');
        return redirect()->to(base_url('mahasiswa'));
    }
}