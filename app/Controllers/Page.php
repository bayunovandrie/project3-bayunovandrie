<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Page extends BaseController
{

    public function index()
    {
        $uri = service('uri');
        return view('page/about', ['uri' => $uri]);
    }

    public function contact()
    {
        $uri = service('uri');

         return view('page/contact', ['uri' => $uri]);
    }

    public function faqs()
    {
        $uri = service('uri');

         return view('page/faqs', ['uri' => $uri]);
    }
}