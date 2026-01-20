<?php

namespace App\Http\Controllers;

use App\Models\PostCDAG;
use Illuminate\Http\Request;

class PostCDAGController extends Controller
{
    public function index()
    {
        $posts = PostCDAG::with('user')->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = PostCDAG::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }
}