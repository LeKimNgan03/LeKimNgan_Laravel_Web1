<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class ProductCategoryHome extends Component
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
        $args = [
            ['status', '=', 1],
            ['parent_id', '=', 0],
        ];
        $category_list = Category::where($args)
            ->orderBy('sort_order', 'asc')
            ->limit(4)
            ->get();
        return view('components.product-category-home', compact('category_list'));
    }
}
