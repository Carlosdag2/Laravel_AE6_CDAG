<?php

namespace App\Http\Controllers;

use App\Models\UserCDAG;
use Illuminate\Http\Request;

class UserCDAGController extends Controller
{
    public function index()
    {
        $users = UserCDAG::with('posts')->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = UserCDAG::with('posts')->findOrFail($id);
        return view('users.show', compact('user'));
    }
}