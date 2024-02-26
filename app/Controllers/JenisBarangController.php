<?php

namespace App\Controllers;
use App\Models\UserModel;
class JenisBarangController extends BaseController
{
    
    public function index()
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $active_date = null;
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'JenisBarang';
                        $data['nav_url'] = 'JenisBarang';

                    $data['content_scripts'][] = '/js/jenisbarang/index.js';
                    $data['barang'] = $this->barang->selectall();
                    
                    $data['jenis_barang'] = $this->jenis_barang->indexData();

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Jenis_Barang/index', $data)
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

                        $data['title'] = 'JenisBarang';
                        $data['nav_url'] = 'JenisBarang';

                    $data['content_scripts'][] = '/js/jenisbarang/create.js';
                    
                    // var_dump($data['report']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Jenis_Barang/created', $data)
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

                        $data['title'] = 'JenisBarang';
                        $data['nav_url'] = 'JenisBarang';

                    $data['content_scripts'][] = '/js/jenisbarang/edit.js';
                    $data['jenis_barang'] = $this->jenis_barang->selectwhere($id);
                    //  var_dump($data['jenis_barang']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('Jenis_Barang/edit', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }

    public function createsave()
    {       
        if(!$this->validate([
            'name' => [
                'rules'=>'required|is_unique[tb_jenis_barang.nama_jenis_barang]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
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
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'nama_jenis_barang' => $this->request->getVar('name'),
        );

        $insert = $this->jenis_barang->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/jenisbarang'
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
    ])){
        $validation = \Config\Services::validation();
            $data = [
                'validation' => $validation

            ];
            $msg = [
                'error' =>[
                    'errorname' => $validation->getError('name'),
                ]
                ];
            return json_encode($msg);
    }
    else{
        $id = $this->request->getVar('id');
        $data = array(
            'nama_jenis_barang' => $this->request->getVar('name'),
        );

       $update = $this->jenis_barang->updateData($id, $data);
       $msg = [
        'sukses' =>[
            'url' => '/jenisbarang'
        ]
        ];
    return json_encode($msg);}
    }
    public function delete()
    {
        $id = $this->request->getVar('id');
        $delete = $this->jenis_barang->deleteData($id);
        return json_encode($delete);
    }



}