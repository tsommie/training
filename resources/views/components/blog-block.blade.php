<h3>Recent Blogs</h3>
<div class="list-group">
    @foreach($blogs as $blog)
        <a href="{{ route('blogs.show', $blog) }}" class="list-group-item list-group-item-action">
            <div class="">
                <h5 class="mb-1 h6">{{ $blog->title }}</h5>
                <small>{{ $blog->published_at }}</small>
            </div>
        </a>
    @endforeach
</div>
