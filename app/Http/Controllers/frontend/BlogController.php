<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $list_post = Post::where([['type', '=', 'post'], ['status', '=', 1]])
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        return view('frontend.blog', compact('list_post'));
    }

    public function post_detail($slug)
    {
        $post = Post::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $args = [
            ['status', '=', 1], ['slug', '=', $slug],
            ['topic_id', '=', $post->topic_id], ['id', '!=', $post->id]
        ];
        $list_post = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->limit(2)->get();
        return view("frontend.blog_detail", compact('post', 'list_post'));
    }

    public function topic($slug)
    {
        $topic = Topic::where([["slug", "=", $slug], ['status', '=', 1]])->first();
        $list_post = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $topic->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(4);
        return view("frontend.blog_topic", compact("list_post", 'topic'));
    }
}
