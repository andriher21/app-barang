<?php

namespace App\Controllers;
use App\Models\UserModel;
class UserController extends BaseController
{
    
    public function index()
    {
        $user= new UserModel();
        if($this->session->get('username')){
                $active_date = null;
                $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                        $data['title'] = 'User';
                        $data['nav_url'] = 'User';

                    $data['content_scripts'][] = '/js/user/index.js';
                    $data['user'] = $this->user->indexData();

                    //  var_dump($data['produk']);
                return view('templates/header')
                        . view('templates/sidebar', $data)
                        . view('User/index', $data)
                        . view('templates/footer');}
                else {
                    return redirect()->to('/');
                }
    }
    public function createsave()
    {       
        if(!$this->validate([
            'username' => [
                'rules'=>'required|is_unique[tb_user.username]',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada di database',
                ]
            ],
            'password' => [
                'rules'=>'required',
                'errors'=>[
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'fullname' => [
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
                    'errorusername' => $validation->getError('username'),
                    'errorpassword' => $validation->getError('password'),
                    'errorfullname' => $validation->getError('fullname'),
                ]
                ];
            return json_encode($msg);
        }
        else{
        $data = array(
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
            'fullname' => $this->request->getVar('fullname'),
            'is_active' => '0',
        );

        $insert = $this->user->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/user'
            ]
            ];
        return json_encode($msg);}
    }
   
    public function setStatus()
    {
        $data = array(
            'is_active' => $_POST['check'] ? '1' : '0'
        );
        $id = $this->request->getVar('id');
         $this->user->updateData($id, $data);
    }



}