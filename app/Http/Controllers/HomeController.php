<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Queue\RedisQueue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user' => 'required',
                'email' => 'required|email',
                'comment' => 'required|min:3'
            ]
            );
            Post::create($request->all());

            return redirect('/home');
    }
}
