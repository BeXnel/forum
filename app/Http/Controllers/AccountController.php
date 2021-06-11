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
        if(Auth::check())
        {
            $data = User::all();
            $posts = Post::where('user', Auth::user()->name)->count('id');
            $published = "siema";
            return view('account_panel', compact('data'), compact('posts'), compact('published'));
        }else{
            return view('not_logged_in');
        }
        
    }
}
