<x-wrapper>
    <div class="card mb-4">
        <div class="card-header bg-white">

            <h2 class="h4">{{ $blog->title }} <br />
                <span class="text-muted small">
                    published {{ $blog->published_at->diffForHumans() }} by <a href="#">{{ $blog->author->name }}</a>
                </span>
            </h2>

        </div>

        <div class="card-body">
            <p class="mb-1">
                {{ $blog->content }}
            </p>

            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-link border-right border-left rounded-0">Edit</a>

            <x-delete-button
                :url="route('blogs.destroy', $blog)"
                :id="$blog->slug"
                :classes="'btn btn-link text-danger'">

                {{ __('Delete') }}
            </x-delete-button>
        </div>
    </div>

    <x-slot name="right_sidebar">
    </x-slot>
</x-wrapper>
