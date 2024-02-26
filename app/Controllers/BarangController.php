<?php

namespace App\Controllers;
use App\Models\UserModel;
class BarangController extends BaseController
{
    
    public function index()
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $active_date = null;
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Barang';
                        $data['nav_url'] = 'Barang';

                    $data['content_scripts'][] = '/js/barang/index.js';
                    $data['barang'] = $this->barang->selectall();
                    
                    $data['jenis_barang'] = $this->jenis_barang->indexData();

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/index', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function createview()
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Barang';
                        $data['nav_url'] = 'Barang';

                    $data['content_scripts'][] = '/js/barang/create.js';
                    $data['kategory'] = $this->jenis_barang->indexData();
                    
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/created', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function editview($id)
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $active_date = null;
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'Barang';
                        $data['nav_url'] = 'Barang';

                    $data['content_scripts'][] = '/js/barang/edit.js';
                    $data['kategory'] = $this->jenis_barang->indexData();
                    $data['produk'] = $this->barang->selectwhere($id);
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Barang/edit', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }

    public function createsave()
    {       
        if(!$this->validate([
            'name' => [
                'rules'=>'required|is_unique[tb_barang.nama_barang]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'kategori' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} harus dipilih',
                ]
            ],
            'harga' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
            'stok' => [
                'rules'=>'required|numeric',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus nomor',
                ]
            ],
        ])){
            $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                    'errorkategori' => $validation->getError('kategori'),
                    'errorharga' => $validation->getError('harga'),
                    'errorstok' => $validation->getError('stok'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'nama' => $this->request->getVar('name'),
            'kategory' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
        );

        $insert = $this->barang->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/barang'
            ]
            ];
        return json_encode($msg);}
    }
    public function editsave()
    {
    if(!$this->validate(['name' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
        ]
    ],
    'kategori' => [
        'rules'=>'required',
        'errors'=>[
            'required' => '{field} harus dipilih',
        ]
    ],
    'harga' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    'stok' => [
        'rules'=>'required|numeric',
        'errors'=>[
            'required' => '{field} tidak boleh kosong',
            'numeric' => '{field} harus nomor',
        ]
    ],
    ])){
        $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                    'errorkategori' => $validation->getError('kategori'),
                    'errorharga' => $validation->getError('harga'),
                    'errorstok' => $validation->getError('stok'),
                ]
                ];
            return json_encode($msg);
    }
    else{
        $id = $this->request->getVar('id');
        $data = array(
            'nama' => $this->request->getVar('name'),
            'kategory' => $this->request->getVar('kategori'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
        );

       $update = $this->barang->updateData($id, $data);
       $msg = [
        'sukses' =>[
            'url' => '/barang'
        ]
        ];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->barang->deleteData($id);
        return json_encode($delete);
    }



}