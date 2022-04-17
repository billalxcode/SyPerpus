<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Account extends BaseController
{
    public function login() {
        $method = strtolower($this->request->getMethod());
        if ($method == "post") {
            $username = $this->request->getVar("username");
            $password = $this->request->getVar("password");

            $userData = $this->userModel->where("username", $username)->first();
            if ($userData) {
                if (password_verify($password, $userData['password'])) {
                    $sesi = [
                        'username' => $username,
                        'role' => $userData['role'],
                        'login' => true,
                    ];

                    if ($userData['role'] == 'admin') {
                        session()->set($sesi);
                        return redirect()->to('admin');
                    } elseif ($userData['role'] == 'anggota') {
                        session()->set($sesi);
                        return redirect()->to('anggota');
                    } else if ($userData['role'] == 'staff') {
                        session()->set($sesi);
                        return redirect()->to('staff');
                    } else {
                        session()->setFlashdata('error', "Maaf anda tidak memiliki peran");
                        return redirect()->to("login");
                    }
                } else {
                    session()->setFlashdata('error', "Password salah");    
                    return redirect()->to("login");
                }
            } else {
                session()->setFlashdata('error', "Maaf akun tidak dapat ditemukan");
                return redirect()->to("login");
            }
        } else {
            $this->context['title'] = "Login Syperpus";
    
            echo view("account/login", $this->context);
        }
    }
}
