<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostItem extends Component
{
    public $row_post = null;
    /**
     * Create a new component instance.
     */
    public function __construct($rowpost)
    {
        $this->row_post = $rowpost;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $post_item = $this->row_post;
        $args1 = [
            ['status', '=', 1],
            ['type', '=', 'post'],
        ];
        $listpost = Post::where($args1)->orderBy('created_at', 'asc')->get();
        return view('components.post-item', compact('post_item', 'listpost'));
    }
}
