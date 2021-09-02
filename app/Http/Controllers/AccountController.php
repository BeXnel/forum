<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class AccountController extends Controller
{
    public function show()
    {
        if (Auth::check())
        {
            $data = User::all();
            $posts = Post::where('user', Auth::user()->name)->count('id');
            $published = Post::where('user', Auth::user()->name)->where('status', 'published')->count('id');
            return view('account_panel', ['data' => $data, 'posts' => $posts, 'published' => $published]);
        }else{
            return view('not_logged_in');
        }
    }
    
    public function edit(Request $request)
    {
        if (Auth::check())
        {
            $request->validate([
                'id' => 'required'
            ]);

            $data = User::all();
            $posts = Post::where('user', Auth::user()->name)->count('id');
            $published = Post::where('user', Auth::user()->name)->where('status', 'published')->count('id');
            return view('account_edit', ['data' => $data, 'posts' => $posts, 'published' => $published]);
        }else{
            return view('not_logged_in');
        }
    }
}
