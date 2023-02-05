<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pegawai;

class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('welcome_message');
        
    }

    public function auth(){
        $session =  session();
        $model = new Pegawai();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $pegawai = $model->where('username', $username)->first();
        // dd($pegawai);
        if($pegawai){
            if ($pegawai["password"] == $password){
                $sess_data = [
                    'user_id' => $pegawai["id_pegawai"],
                    'user_name' => $pegawai['nama_pegawai'],
                    'logged_in' => TRUE,
                    'role' => $pegawai['id_bagian']
                ];

                $session->set($sess_data);
                return redirect()->to('/dashboard');
            }
            else{
                $session->setFlashdata('msg', 'Wrong Password');
            }
        }

    }

    public function logout(){
        $session = $session();
        $session->destroy();
        return redirect()->to('/');
    }
}
