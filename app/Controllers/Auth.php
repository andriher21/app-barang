<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\RoleModel;
class Auth extends BaseController
{  
    public function index()
    {
        if ($this->session->get('username')) {
           return redirect()->to('/dashboard');
        }
        
        $this->validation->setRule('username', 'Username', 'trim|required');
        $this->validation->setRule('password', 'Password', 'trim|required');

        // if ($this->validation->run() == false) {

          
            return view('templates/auth_header')
                . view('Auth/login')
                . view('templates/auth_footer');
        // } 
        // else {

        //     // validasi suskses
        //     $this->_login();
        // }
    }
    public function register_view()
    {
        if ($this->session->get('username')) {
            return redirect()->to('/barang');
         }
                 
         $data['content_scripts'][] = '/js/auth/register.js';
             return view('templates/auth_header')
                 . view('Auth/register',$data)
                 . view('templates/auth_footer');
    }
    public function registerasi_save()
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
        );

        $insert = $this->user->insertData($data);
        $msg = [
            'sukses' =>[
                'url' => '/login'
            ]
            ];
        return json_encode($msg);}
    }
    public function login()
    {   
        $usermodel = new UserModel();
        $login =[
        'username' => $this->request->getVar('username'),
        'password' => md5($this->request->getVar('password')),
        'is_active' => '1',
    ];
        $user = $usermodel->where($login)->first();
        // var_dump($user);    
        if ($user != null) {
            $data = [
                'username' => $user['username'],
                'userid' => $user['id_user']

            ];
            $this->session->set($data);
            // var_dump($role);
            return redirect()->to('/dashboard');
             
            echo "Berhasil Login";
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">
					Wrong Username and Password!</div>');
                    return redirect()->to('/');
            echo "gagal login";
        }
    }

    public function logout()
    {
        unset($_SESSION['username'],
              $_SESSION['role_id'] ,                     
              $_SESSION['userid'] );
        $this->session->setFlashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            &nbsp;&nbsp;&nbsp;&nbsp;Logged Out.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
       return  redirect()->to('/');
    }
}
