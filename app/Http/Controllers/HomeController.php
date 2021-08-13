<?php

namespace App\Http\Controllers;

use App\Models\DB;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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
        $count = Post::where('status', 'published')->count('id');
        $views = Post::sum('views');
        $max = Post::max('views');
        $popular = Post::where('views', $max)->where('status', 'published')->first();

        if(Auth::check())
        {
            return view('home', compact('posts'), ['count' => $count, 'views' => $views, 'max' => $max, 'popular' => $popular]);
        }else{
            return view('not_logged_in');
        }     
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user' => 'required',
                'email' => 'required|email',
                'topic' => 'required|min:3|max:120',
                'category' => 'required',
                'content' => 'required|min:3',
            ]);
            Post::create($request->all());
            User::where('name', $request->user)->increment('posts', 1);

            if(Auth::check())
            {
                return redirect('/home');
            }else{
                return view('not_logged_in');
            }     
    }

    public function search(Request $request)
    {
        $request->validate(
            [
                'query' => 'required'
            ]
            );
        $search_query = $request->get('query');
        $search = Post::select()->where(DB::raw("(status = 'published' and topic like '%$search_query%') OR (status = 'published' and content like '%$search_query%')"))->get();

        $search_count = Post::select()->where(DB::raw("(status = 'published' and topic like '%$search_query%') OR (status = 'published' and content like '%$search_query%')"))->count();
        
        if(Auth::check())
        {
            return view('search', compact('search'), compact('search_count'));
        }else{
            return view('not_logged_in');
        }    
    }
}
