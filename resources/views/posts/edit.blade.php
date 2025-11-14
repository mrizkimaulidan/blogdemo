@extends('layouts.app')
@section('title','Edit Post')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h4 mb-3">Edit Post</h1>
            <form action="{{ route('posts.update', $post) }}" method="POST">
                @method('PUT')
                @include('posts._form', ['submit' => 'Update'])
            </form>
        </div>
    </div>
@endsection
