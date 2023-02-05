<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        // dd($session->get('role'));
        $role = $session->get('role');
        if ($role == "1"){
            return redirect()->to('/admin');
        }
        
    }
}
