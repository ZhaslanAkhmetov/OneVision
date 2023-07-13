<?php

namespace App\Http\Controllers;

use App\Models\Models\Post;
use App\Models\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function show()
    {
        $posts = new Show();
        dd($posts->getPosts());
        $response = Http::get('https://dummyjson.com/posts?limit=0&skip=130');

        $posts = json_decode($response->body());
//        dd(gettype($posts));

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author_name' => 'required',
        ]);

        Show::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Show created successfully');
    }

    public function edit(Show $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Show $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'author_name' => 'required',
        ]);

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Show updated successfully');
    }

    public function destroy(Show $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Show deleted successfully');
    }
}
