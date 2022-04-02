@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }} 
                </h1>
                <h2>
                    by {{ $post->user->name }}
                </h2>
                in category {{ $post->category->title }}
                <p>
                    {{ $post->body }}
                </p> 
                <a href="{{ route('post.index') }}">Go back</a>
            </div>
        </div>
    </div>
@endsection