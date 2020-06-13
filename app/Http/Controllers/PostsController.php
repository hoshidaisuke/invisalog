<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        $posts = App\Post::find(1)->content;
        // 認証済みユーザを取得

        return view('index', ['posts' => $posts]);
    }
}
