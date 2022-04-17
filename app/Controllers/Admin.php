<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $userSession = $this->checkSession();
        if ($userSession && $userSession['role'] == 'admin') {
            $this->context['title'] = "Dashboard Admin";
            
            echo view('admin/layout/header', $this->context);
            echo view('admin/layout/sidebar');
            echo view('admin/dashboard');
            echo view('admin/layout/footer');
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("login");
        }
    }
}
