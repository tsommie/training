<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\View\Component;

class BlogBlock extends Component
{
    public $blogs;

    /**
     * Create a new component instance.
     *
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blogs = $blog->latest()
                            ->limit(5)
                            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.blog-block');
    }
}
