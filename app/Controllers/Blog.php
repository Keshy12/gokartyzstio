<?php

namespace App\Controllers;


class Blog extends BaseController
{
    public function index()
    {
        $data = [
            'meta_title' => 'Codeigniter 4 Blog',   
            'title' => 'This is a Blog Page',
        ];

        $post = ['Title 1', 'Title 2', 'Title 3'];
        $data['posts'] = $post;

        echo view('templates/header', $data);
        echo view('blog');
        echo view('templates/footer');     
    }
    
    public function post(){
        $data = [
            'meta_title' => 'Codeigniter 4 Post Page',   
            'title' => 'This is an Awesome Blog',
        ];
        echo view('templates/header', $data);
        echo view('single_post');
        echo view('templates/footer');  
    }
}
