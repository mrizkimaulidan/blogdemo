@csrf
<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="form-control" />
    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Body</label>
    <textarea name="body" rows="6" class="form-control">{{ old('body', $post->body ?? '') }} </textarea>
    @error('body') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

@if(isset($tags) && $tags->count())
@php
$selectedTagIds = (array) old('tags', isset($post) ? $post->tags->pluck('id')->toArray() : []);
@endphp
<div class="mb-3">
    <label class="form-label">Tags</label>
    <div class="row row-cols-2 row-cols-md-3 g-2">
        @foreach($tags as $tag)
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    id="tag{{ $tag->id }}" @checked(in_array($tag->id, $selectedTagIds))>
                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<button class="btn btn-primary">{{ $submit ?? 'Save' }}</button>
<a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>