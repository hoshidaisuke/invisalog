<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $data = [];
        // 認証済みユーザを取得
        $user = \Auth::user();
        $posts = $user->posts();

        return view('index', ['posts' => $posts]);
    }
}
