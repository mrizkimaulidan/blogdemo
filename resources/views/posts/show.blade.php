@extends('layouts.app')
@section('title',$post->title)
@section('content')
<div class="card">
    <div class="card-body">
        <div class="mb-2">
            @foreach($post->tags as $tg)
            <span class="badge text-bg-secondary">{{ $tg->name }}</span>
            @endforeach
        </div>

        <h1 class="h3">{{ $post->title }}</h1>
        <p class="text-muted mb-3">by {{ $post->user?->name ?? '—' }} • {{ $post->created_at->diffForHumans() }} >
        <div class="mb-4" style="white-space:pre-line">{{ $post->body }}</div>
        <a href="{{ route('posts.edit',$post) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection