<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\URI;

class Petugas extends BaseController
{
    public function index()
    {
        $userSession = $this->checkSession();
        if ($userSession && $userSession['role'] == 'admin') {
            $this->context['title'] = "Master Data - Petugas";
            $this->context['page'] = "Petugas";
            $this->context['desc'] = "Kamu dapat menambah,menghapus,mengupdate,dan impor data";
            $this->context['breadcrumbs'] = [
                [
                    'name' => 'Master Data',
                    'link' => base_url('admin/master'),
                    'active' => false
                ],
                [
                    'name' => 'Petugas',
                    'link' => base_url('admin/master/petugas'),
                    'active' => true
                ],
            ];
            $this->context['users'] = $this->userModel->where("role", "staff")->findAll();

            echo view('admin/layout/header', $this->context);
            echo view('admin/layout/sidebar', $this->context);
            echo view('admin/master/petugas/view', $this->context);
            echo view('admin/layout/footer');
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("login");
        }
    }

    public function update()
    {
        $method = strtolower($this->request->getMethod());
        $rules = [
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'label' => "Username",
                'errors' => [
                    'required' => "Masukan username dengan benar",
                    'is_unique' => "Username telah digunakan",
                ]
            ],
            'name' => [
                'rules' => 'required',
                'label' => "Nama lengkap",
                'errors' => [
                    'required' => "Masukan nama lengkap dengan benar"
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'label' => 'Email',
                'errors' => [
                    'required' => "Masukan email dengan benar",
                    "valid_email" => "Email tidak valid"
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'label' => 'Kelamin',
                'errors' => [
                    'required' => "Masukan jenis kelamin"
                ]
            ]
        ];

        $userSession = $this->checkSession();
        if ($userSession && $userSession['role'] == 'admin') {
            $this->context['title'] = "Master Data - Petugas";
            $this->context['page'] = "Update petugas";
            $this->context['desc'] = "Kamu dapat mengupdate data";
            $this->context['breadcrumbs'] = [
                [
                    'name' => 'Master Data',
                    'link' => base_url('admin/master'),
                    'active' => false
                ],
                [
                    'name' => 'Petugas',
                    'link' => base_url('admin/master/petugas'),
                    'active' => false
                ],
                [
                    'name' => 'Update',
                    'active' => true
                ],
            ];

            if ($method == "post") {
                if ($this->validate($rules)) {
                    $name = $this->request->getVar("name");
                    $email = $this->request->getVar("email");
                    $userid = $this->request->getVar("petugas_id");
                    $gender = $this->request->getVar("gender");
                    $address = $this->request->getVar("address");
                    $username = $this->request->getVar("username");
                    $password = $this->request->getVar('password');
                    $redirect_to = $this->request->getVar("redirect_to");
                    if ($password) {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                    }

                    $petugasData = $this->userModel->where(['id' => $userid, 'role' => "staff"])->first();
                    if ($petugasData) {
                        if ($email != $petugasData['email'] && $this->userModel->where("email", $email)->first()) {
                            session()->setFlashdata('error', "Email sudah digunakan");
                            return redirect()->to("admin/master/petugas/create");
                        } else if ($username != $petugasData['username'] && $this->userModel->where("username", $username)->first()) {
                            session()->setFlashdata('error', "Username sudah digunakan");
                            return redirect()->to("admin/master/petugas/create");
                        } else {
                            $data_post = [
                                'username' => $username,
                                'email' => $email,
                                'name' => $name,
                                'gender' => $gender,
                                'address' => $address,
                                'password' => ($password != null ? $petugasData['password'] : $password),
                            ];

                            $this->userModel->update($petugasData['id'], $data_post);
                            session()->setFlashdata('success', "Data berhasil ditambahkan");
                            if ($redirect_to) {
                                return redirect()->to($redirect_to);
                            } else {
                                return redirect()->to("admin/master/petugas/update");
                            }
                        }
                    } else {
                        session()->setFlashdata('error', "Data tidak ditemukan");
                        return redirect()->to("admin/master/petugas/create");
                    }
                } else {
                    session()->setFlashdata('errors', $this->validator->getErrors());
                    return redirect()->to("admin/master/petugas/create");
                }
            } else {
                $petugas_id = $this->request->getVar("id");
                $redirect_url = $this->request->getVar("redirect_url");

                $petugasData = $this->userModel->where(['id' => $petugas_id, 'role' => 'staff'])->first();
                if ($petugasData) {
                    $uri = new URI($redirect_url);
                    $uri_data = $uri->getPath();

                    $this->context['data'] = $petugasData;
                    $this->context['redirect_to'] = $uri_data;
                    $this->context['petugas_id'] = $petugasData['id'];

                    echo view('admin/layout/header', $this->context);
                    echo view('admin/layout/sidebar', $this->context);
                    echo view('admin/master/petugas/update', $this->context);
                    echo view('admin/layout/footer');
                } else {
                    $this->session->setFlashdata("error", "Data tidak ditemukan");
                    return redirect()->to("admin/master/petugas");
                }
            }
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("login");
        }
    }

    public function create()
    {
        $method = strtolower($this->request->getMethod());
        $rules = [
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'label' => "Username",
                'errors' => [
                    'required' => "Masukan username dengan benar",
                    'is_unique' => "Username telah digunakan",
                ]
            ],
            'name' => [
                'rules' => 'required',
                'label' => "Nama lengkap",
                'errors' => [
                    'required' => "Masukan nama lengkap dengan benar"
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]|valid_email',
                'label' => 'Email',
                'errors' => [
                    'required' => "Masukan email dengan benar",
                    "is_unique" => "Email telah digunakan",
                    "valid_email" => "Email tidak valid"
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'label' => 'Kelamin',
                'errors' => [
                    'required' => "Masukan jenis kelamin"
                ]
            ],
            'password' => [
                'rules' => 'required',
                'label' => "Password",
                'errors' => [
                    'required' => "Masukan password dengan benar"
                ]
            ]
        ];

        $userSession = $this->checkSession();
        if ($userSession && $userSession['role'] == 'admin') {
            $this->context['title'] = "Master Data - Petugas";
            $this->context['page'] = "Tambah petugas";
            $this->context['desc'] = "Kamu dapat menambah data";
            $this->context['breadcrumbs'] = [
                [
                    'name' => 'Master Data',
                    'link' => base_url('admin/master'),
                    'active' => false
                ],
                [
                    'name' => 'Petugas',
                    'link' => base_url('admin/master/petugas'),
                    'active' => false
                ],
                [
                    'name' => 'Create',
                    'active' => true
                ],
            ];

            if ($method == "post") {
                if ($this->validate($rules)) {
                    $username = $this->request->getVar("username");
                    $name = $this->request->getVar("name");
                    $email = $this->request->getVar("email");
                    $gender = $this->request->getVar("gender");
                    $address = $this->request->getVar("address");
                    $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

                    $data_post = [
                        'username' => $username,
                        'email' => $email,
                        'name' => $name,
                        'gender' => $gender,
                        'address' => $address,
                        'password' => $password,
                        'role' => 'staff'
                    ];
                    $this->userModel->save($data_post);

                    session()->setFlashdata('success', "Data berhasil ditambahkan");
                    return redirect()->to("admin/master/petugas/create");
                } else {
                    session()->setFlashdata('errors', $this->validator->getErrors());
                    return redirect()->to("admin/master/petugas/create");
                }
            } else {
                echo view('admin/layout/header', $this->context);
                echo view('admin/layout/sidebar', $this->context);
                echo view('admin/master/petugas/create', $this->context);
                echo view('admin/layout/footer');
            }
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("login");
        }
    }

    public function delete()
    {
        $method = strtolower($this->request->getMethod());
        $userSession = $this->checkSession();
        if ($userSession && $userSession['role'] == 'admin') {
            if ($method == "post") {
                $userid = $this->request->getVar("id");
                $redirect_to = $this->request->getVar("redirect_url");

                $anggotaData = $this->userModel->where(['id' => $userid, 'role' => 'staff'])->first();
                if ($anggotaData) {
                    $this->userModel->delete($anggotaData['id']);
                    session()->setFlashdata('success', "Data berhasil ditambahkan");
                    if ($redirect_to) {
                        $uri = new URI($redirect_to);
                        $uri_data = $uri->getPath();
                        return redirect()->to($uri_data);
                    } else {
                        return redirect()->to("admin/master/petugas");
                    }
                } else {
                    session()->setFlashdata('error', "Data tidak ditemukan");
                    return redirect()->to("admin/master/petugas");
                }
            } else {
                session()->setFlashdata('error', "Tidak dapat menghapus data");
                return redirect()->to("admin/master/petugas");
            }
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("login");
        }
    }
}
