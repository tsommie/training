<x-wrapper>
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ isset($blog) ? route('blogs.update', $blog) : route('blogs.store') }}">
                @csrf
                @if (isset($blog))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">{{ __('Blog Title') }}</label>

                    <div>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                               name="title" value="{{ old('title', $blog->title ?? null) }}">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">{{ __('Blog Content') }}</label>

                    <div>
                        <textarea rows="10" id="content" class="form-control @error('content') is-invalid @enderror"
                                  name="content">{{ old('content', $blog->content ?? null) }}</textarea>

                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="meta_keywords">{{ __('Meta Keywords') }}</label>

                    <div>
                        <textarea id="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror"
                                  name="meta_keywords">{{ old('meta_keywords', $blog->meta_keywords ?? null) }}</textarea>

                        @error('meta_keywords')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="meta_description">{{ __('Meta Description') }}</label>

                    <div>
                        <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                  name="meta_description">{{ old('meta_description', $blog->meta_description ?? null) }}</textarea>

                        @error('meta_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-radio">
                        <input type="radio" id="publish1" name="published_at" class="custom-control-input" {{ isset($blog) && $blog->published_at !== null ? 'checked=""' : null }} value="1">
                        <label class="custom-control-label" for="publish1">Publish</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="publish2" name="published_at" class="custom-control-input" {{ isset($blog) && $blog->published_at === null ? 'checked=""' : null }} value="0">
                        <label class="custom-control-label" for="publish2">Un publish</label>
                    </div>
                </div>

                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <x-slot name="right_sidebar">
    </x-slot>
</x-wrapper>
