<?php

namespace App\Http\Controllers;
use App\Models\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Posty extends Controller
{
    public function show()
    {
        $posts = Post::all();

        if(Auth::check())
        {
            return view('panel.posts', compact('posts'));
        }else{
            return view('not_logged_in');
        }
        
    }

    public function show_more($category, Request $request)
    {
        $request->validate(
            [
                'id' => 'required'
            ]
            );
        $temp = $request->get('id');
        

        $posts = Post::where('category', $category)->where('status', 'published')->where('id', $temp)->get();
        $posts_count = Post::where('category', $category)->where('status', 'published')->count('id');
        
        if(Auth::check())
        {
            return view('category_show_more', compact('posts'), compact('posts_count'));
        }else{
            return view('not_logged_in');
        }

        
    }

    public function category($category)
    {
        $posts = Post::where('category', $category)->where('status', 'published')->get();
        $posts_count = Post::where('category', $category)->where('status', 'published')->count('id');

        if(Auth::check())
        {
            return view('category', compact('posts'), compact('posts_count'));
        }else{
            return view('not_logged_in');
        }
        
        
    }

    public function publish(Request $request)
    {
        Post::where('id', $request->id)->update(['status' => 'published']);

        return redirect('/posty');
    }

    public function edit(Request $request)
    {
        $posts = Post::all();

        $id = Post::where('id', $request->id)->get();

        return view('post_edit', compact('id'), compact('posts'));
    }

    public function save(Request $request)
    {
        $request->validate(
            [
                'id' => 'required',
                'comment' => 'required|min:3'
            ]
            );
            Post::where('id', $request->id)->update(array(
                'comment' => $request->comment, 
                'status' => 'draft'));

            return redirect('/posty');
    }

    public function delete(Request $request)
    {
        Post::where('id', $request->id)->delete();  

        return redirect('/posty');
    }

    public function unpublish(Request $request)
    {
        Post::where('id', $request->id)->update(['status' => 'draft']);
        
        return redirect('/posty');
    }
}
