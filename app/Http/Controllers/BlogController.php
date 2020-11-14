<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.blog.index')->with([
            'blogs' => Blog::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.blog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'content'           => ['required', 'string'],
            'meta_description'  => ['required', 'string', 'max:255'],
            'meta_keywords'     => ['required', 'string', 'max:255'],
            'published_at'      => ['nullable', 'boolean']
        ]);

        $validated['published_at'] = $validated['published_at'] !== '0' ? now() : null;

        $blog = Blog::create($validated);

        return redirect()->route('blogs.show', $blog)->with([
            'status' => __('Blog created successfully!')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('pages.blog.show')->with([
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('pages.blog.form')->with([
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'content'           => ['required', 'string'],
            'meta_description'  => ['required', 'string', 'max:255'],
            'meta_keywords'     => ['required', 'string', 'max:255'],
            'published_at'      => ['nullable', 'boolean']
        ]);

        $validated['published_at'] = $validated['published_at'] !== '0' ? now() : null;

        $blog->update($validated);

        return redirect()->back()->with([
            'status' => __('Blog updated successfully!')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $clonedBlog = clone $blog;

        $blog->delete();

        return redirect()->route('blogs.index')->with([
            'status' => $clonedBlog->title . ' was deleted successfully!'
        ]);
    }
}
