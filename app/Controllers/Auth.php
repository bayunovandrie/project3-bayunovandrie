<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersLogin;

class Auth extends BaseController
{

    protected $user;
    public function __construct()
    {
        $this->user = new UsersLogin();
    }

    public function create_user()
    {
        $password = "12345";
        
        $data = [
            "username" => "dev_account",
            "password" => $this->user->hashPassword($password),
            "created_at" => date('Y-m-d H:i:s')
        ];

        // var_dump($data);

        if ($this->user->createUser($data)) {
            echo "User created successfully.";
        } else {
            echo "Failed to create user.";
        }
    }
    public function index()
    {
        return view('admin/auth/page_login');
    }

    public function login()
    {
        // Retrieve the username and password from the POST request
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        // Retrieve the user by username
        $user = $this->user->getUserByUsername($username);


        if ($user) {

            // echo $user['password'];
            // die;
            // password_verify($user['password'], $password)

            if($user['password'] == $password) {
                // Set session data
                $session = session();
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'logged_in' => true,
                ]);
                return redirect()->to("/admin/post");
                // echo "valid";
            } else {

                // echo "not valid";
                return redirect()->back()->with('error', 'Password Not Match');
            }
            die;
            // Redirect to the admin page
        } else {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Username Not Found');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/'); // Redirect to login page
    }

    
}