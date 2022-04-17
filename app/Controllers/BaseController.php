<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\RequestInterface
     */
    protected $request;
    protected $session;
    protected $helpers = [];
    protected $context = [];

    // Models
    protected $userModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        
        $this->session = Services::session();
        $this->userModel = new UsersModel();
    }

    public function checkSession() {
        $username = $this->session->get("username");
        if ($username) {
            $userData = $this->userModel->where("username" , $username)->first();
            if ($userData) {
                return $userData;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
