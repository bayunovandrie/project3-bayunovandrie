<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersLogin;
use CodeIgniter\HTTP\ResponseInterface;

class Setting extends BaseController
{

    protected $user;
    public function __construct()
    {
        $this->user = new UsersLogin();
    }
    public function index()
    {
        $data['user'] = $this->user->findAll();

        return view('admin/main/setting/user_set', $data);
    }
}