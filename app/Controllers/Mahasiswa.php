<?php

namespace App\Controllers;

use Codeigniter\Controller;
use App\Models\Mahasiswamodel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\RESTful\ResourceController;


class Mahasiswa extends ResourceController
{

    protected $format = 'json';
    protected $Mahasiswamodel;
    public function __construct()
    {


        $this->Mahasiswamodel = new Mahasiswamodel();
    }

    public function index()
    {
        return $this->respond($this->Mahasiswamodel->getMahasiswa(), 200);
    }

    public function detail($id)
    {
        $get = $this->Mahasiswamodel->getMahasiswaById($id);
        return $this->respond($get, 200);
    }

    public function add()
    {
        $valid = $this->validate([
            'nim' => [
                'label' => 'nim',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'nama' => [
                'label' => 'nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'alamat' => [
                'label' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'umur' => [
                'label' => 'umur',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'hobi' => [
                'label' => 'hobi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);
        if (!$valid) {
            $response = [
                'status' => 500,
                'error' => true,
                'data' => \config\Services::validation()->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $nim = $this->request->getPost('nim');
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $umur = $this->request->getPost('umur');
            $hobi = $this->request->getPost('hobi');


            $data = [
                'nim' => $nim,
                'nama' => $nama,
                'alamat' => $alamat,
                'umur' => $umur,
                'hobi' => $hobi,
            ];
            $simpan =  $this->Mahasiswamodel->addMahasiswa($data);
            if ($simpan) {
                $msg = ['message' => 'mahasiswa berhasil ditambahkan'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }
    public function edit($id = null)
    {



        $valid = $this->validate([
            'nim' => [
                'label' => 'nim',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'nama' => [
                'label' => 'nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'alamat' => [
                'label' => 'alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'umur' => [
                'label' => 'umur',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
            'hobi' => [
                'label' => 'hobi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi'
                ]
            ],
        ]);
        if (!$valid) {
            $response = [
                'status' => 500,
                'error' => true,
                'data' => \config\Services::validation()->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $nim = $this->request->getPost('nim');
            $nama = $this->request->getPost('nama');
            $alamat = $this->request->getPost('alamat');
            $umur = $this->request->getPost('umur');
            $hobi = $this->request->getPost('hobi');


            $data = $this->request->getRawInput();
            $edit =  $this->Mahasiswamodel->updateMahasiswa($data, $id);
            if ($edit) {
                $msg = ['message' => 'mahasiswa berhasil diedit'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }
    public function delete($id = null)
    {
        $this->Mahasiswamodel->delete($id);
        $msg = ['message' => 'data mahasiswa berhasil dihapus'];
        $Response = [
            'data' => $msg,
        ];
        return $this->respond($Response, 200);
    }
}