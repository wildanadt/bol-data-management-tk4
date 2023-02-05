<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bagian as BagianModel;

class Bagian extends BaseController
{
    public function index()
    {
        if(session()->get('role') == "1"){
            $bagians = new BagianModel();
             
            echo view('bagian/index', [
                "DaftarBagian" => $bagians->findAll(),
            ]);

        }
    }
}
