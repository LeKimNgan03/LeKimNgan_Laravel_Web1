<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $list_post = Post::where([['type', '=', 'post'], ['status', '=', 1]])
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('components.last-post', compact('list_post'));
    }
}
