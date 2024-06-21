<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Post;

class LastPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_post = Post::where([['type', '=', 'post'], ['status', '=', 1]])
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
        return view('components.last-post', compact('list_post'));
    }
}
