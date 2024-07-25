<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\PostModel;

class Post extends BaseController
{
    public function index()
    {
    // buat object model $post
        $post = new PostModel();
        /*
        siapkan data untuk dikirim ke view dengan nama $posts
        dan isi datanya dengan post yang sudah terbit
        */
        $data['posts'] = $post->where('status', 'published')->findAll();
        $data['uri'] = service('uri');
        // kirim data ke view
        return view('blog/post', $data);
    }

    public function viewPost($slug)
    {
        $post = new PostModel();
        $data['post'] = $post->where([
        'slug' => $slug,
        'status' => 'published'
        ])->first();
        // tampilkan 404 error jika data tidak ditemukan
        if (!$data['post']) {
        throw PageNotFoundException::forPageNotFound();
        }

        $data['uri'] = service('uri');
        return view('blog/post_detail', $data);
    }
}