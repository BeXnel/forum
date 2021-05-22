<?php

namespace App\Http\Controllers;
use App\Models\DB;
use App\Models\Post;

use Illuminate\Http\Request;

class Posty extends Controller
{
    public function show()
    {
        $posts = Post::all();

        return view('panel.posts', compact('posts'));
    }

    public function publish(Request $request)
    {
            Post::where('id', $request->id)->update(['status' => 'published']);

            //dd($request);

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
