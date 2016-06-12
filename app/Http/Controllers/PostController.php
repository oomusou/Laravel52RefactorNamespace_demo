<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\PostService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = app(PostService::class)->displayAllPosts();
        return view('post.index', $data);
    }
}
