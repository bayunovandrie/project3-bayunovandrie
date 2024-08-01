<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    protected $post;

    public function __construct()
    {
        $this->post = new PostModel();
        
    }
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->orderBy('created_at', 'DESC')->findAll();

        return view('admin/main/admin_post_list', $data);
    }

    public function preview($id)
    {

        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if(!$data['post']){
            throw PageNotFoundException::forPageNotFound();
        }
        return view('admin/main/post_detail', $data);
    }

    public function insert_user()
    {
        try {
            $post = new PostModel();

            $slug = $this->request->getPost('title');
            $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
            $slug = trim($slug, '-');
    
            $data = [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => 'draft',
                "author" => $this->request->getPost('author'),
                "slug" => $slug
            ];

            // url_title($this->request->getPost('title'), '-', TRUE)
            
            $post->insert($data);
    
            $url = base_url('admin/post');
    
            echo json_encode(array("url" => $url, "data" => $data));
        } catch (\Exception $e) {
            echo json_encode(array("error" => $e->getMessage()));
        }
    }


    public function create()
    {
        // tampilkan form create
        return view('admin/main/admin_post_create');
    }

    public function edit_view($blogID) 
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $blogID)->first();
        
        return view('admin/main/view_edit', $data);

    }

    public function edit($id)
    {
    // ambil artikel yang akan diedit
    $post = new PostModel();
    $data['post'] = $post->where('id', $id)->first();
    // lakukan validasi data artikel
    $validation = \Config\Services::validation();
    $validation->setRules([
        'id' => 'required',
        'title' => 'required'
    ]);
    $isDataValid = $validation->withRequest($this->request)->run();
    // jika data vlid, maka simpan ke database
    if($isDataValid){
        $post->update($id, [
        "title" => $this->request->getPost('title'),
        "content" => $this->request->getPost('content'),
        "status" => $this->request->getPost('status'),
        "author" => $this->request->getPost('author')
        ]);
        return redirect('admin/post');
        }
    // tampilkan form edit
    return view('admin/main/admin_post_update', $data);
    }

    public function delete()
    {
        $post = new PostModel();
        $id = $_POST['id_blog'];
        $post->delete($id);
        return redirect('admin/post');
    }

    public function edit_status($status, $id_blog)
    {
        if ($status == 'published') {
            $this->post->update($id_blog, [
                'status' => "draft"
            ]);
        } elseif($status == 'draft') {
            $this->post->update($id_blog, [
                'status' => "published"
            ]);
        }

        return redirect('admin/post');
    }
}