<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\NavModel;
class DashboardController extends BaseController
{
    
    public function index()
    {
        $user =new  UserModel();
        if($this->session->get('username')){
            $active_date = null;
            $data['sess'] = $user->where(['username' => $this->session->get('username')])->first();

                    $data['title'] = 'Dashboard';
                    $data['nav_url'] = 'Dashboard';

                $data['content_scripts'][] = '/js/barang/index.js';
                $data['barang'] = $this->barang->selectcount();
                
                $data['jenisbarang'] = $this->jenis_barang->selectcount();
                $data['user'] = $this->user->selectcount();

                //  var_dump($data);
            return view('templates/header')
                    . view('templates/sidebar', $data)
                    . view('dashboard', $data)
                    . view('templates/footer');}
            else {
                return redirect()->to('/');
            }
    }
}