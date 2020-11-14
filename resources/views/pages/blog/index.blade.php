<x-layouts>
    @foreach($blogs as $blog)
        <div class="card mb-4">
            <div class="card-body">

                <h2 class="h4">{{ $blog->title }} <br />
                    <span class="text-muted small">
                    published {{ $blog->published_at->diffForHumans() }} by <a href="#">{{ $blog->author->name }}</a>
                </span>
                </h2>

                <p class="mb-1">
                    {{-- Refactor route path after we need to use it in more than one blade view --}}
                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-link">More</a>
                    <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-link border-right border-left rounded-0">Edit</a>
                    <x-delete-button
                        :url="route('blogs.destroy', $blog)"
                        :id="$blog->slug"
                        :classes="'btn btn-danger'">

                        {{ __('Delete') }}
                    </x-delete-button>
                </p>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{-- Register bootstrap as pagination template in the service provider --}}
        {{ $blogs->links() }}
    </div>

    <x-slot name="right_sidebar">
    </x-slot>
</x-layouts>
