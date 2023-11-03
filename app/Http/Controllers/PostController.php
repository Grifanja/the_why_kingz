<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('active', true)
                 ->select('id', 'title', 'url', 'preview', 'active', 'created_at')
                 ->get();

        return response()->json($posts);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->active = (bool)$request->input('active');
        $post->save();
        return response()->json(['message' => 'The status of news has been changed']);
    }
}
