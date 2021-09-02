<?php

namespace App\Http\Controllers;
use App\Models\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

use Illuminate\Http\Request;

class Posty extends Controller
{
    public function show()
    {
        $posts = Post::all();

        if (Auth::check())
        {
            return view('panel.posts', compact('posts'));
        }else{
            return view('not_logged_in');
        }
    }

    public function showMore($category, $id)
    {
        Post::where('id', $id)->increment('views', 1);

        $posts = Post::where('category', $category)->where('status', 'published')->where('id', $id)->get();
        $posts_count = Post::where('category', $category)->where('status', 'published')->count('id');

        $comments = Comment::where('id_post', $id)->get();
        
        if (Auth::check())
        {
            return view('category_show_more', ['comments' => $comments, 'posts' => $posts, 'posts_count' => $posts_count]);
        }else{
            return view('not_logged_in');
        }     
    }

    public function category($category)
    {
        $posts = Post::where('category', $category)->where('status', 'published')->get();
        $posts_count = Post::where('category', $category)->where('status', 'published')->count('id');

        if (Auth::check())
        {
            return view('category', compact('posts'), compact('posts_count'));
        }else{
            return view('not_logged_in');
        }
    }

    public function comment(Request $request, $category)
    {
        $request -> validate([
            'id_post' => 'required',
            'comment' => 'required|min:3'
        ]);
        Comment::create($request->all());
        return redirect()->route('show_more', ['category' => $category, 'id' => $request->id_post]);
    }

    public function stats($category)
    {
        $count = Post::where('category', $category)->count('id');
        $published = Post::where('category', $category)->where('status', 'published')->count('id');
        $unpublished = Post::where('category', $category)->where('status', 'draft')->count('id');
        $views = Post::where('category', $category)->sum('views');

        if (Auth::check())
        {
            return view('stats', 
        [
            'count' => $count, 
            'published' => $published, 
            'unpublished' => $unpublished, 
            'views' => $views,
            'category' => $category
        ]);
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
                'content' => 'required|min:3'
            ]
            );
            Post::where('id', $request->id)->update(array(
                'content' => $request->content, 
                'status' => 'draft'));

            return redirect('/posty');
    }

    public function delete(Request $request)
    {
        Post::where('id', $request->id)->delete();  
        Comment::where('id_post', $request->id)->delete();
        return redirect('/posty');
    }

    public function unpublish(Request $request)
    {
        Post::where('id', $request->id)->update(['status' => 'draft']);
        
        return redirect('/posty');
    }
}