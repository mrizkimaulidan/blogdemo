@extends('layouts.app')
@section('title','New Post')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h4 mb-3">New Post</h1>
            <form action="{{ route('posts.store') }}" method="POST">
                @include('posts._form', ['submit' => 'Create'])
            </form>
        </div>
    </div>
@endsection
