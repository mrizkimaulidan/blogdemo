@extends('layouts.app')

@section('title','All Posts')
@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="h4 mb-3">All Posts</h1>

        <form action="" method="GET">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Search</span>
                <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                    placeholder="Search for a keyword..">

                <select class="form-select" name="tag">
                    <option value="">Choose Tag</option>
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @selected($tag->id == request('tag'))>{{ $tag->name }}</option>
                    @endforeach
                </select>

                <a href="{{ route('posts.index') }}" class="btn btn-outline-warning">Reset</a>
                <button type="submit" class="btn btn-outline-secondary">Cari</button>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Tags</th>
                    <th>Created</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.show',$post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->user?->name ?? '—' }}</td>
                    <td>
                        @foreach($post->tags as $tg)
                        <span class="badge text-bg-secondary">{{ $tg->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $post->created_at->format('d M Y') }}</td>
                    <td class="text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('posts.edit',$post) }}">Edit</a>
                        <form action="{{ route('posts.destroy',$post) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">No posts</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
@endsection