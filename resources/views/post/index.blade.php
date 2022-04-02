@extends('layouts.app')
@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="container">
                        <div class="row">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endauth
                            <div class="col-12 pt-2">
                                <div class="row">
                                    <div class="col-8">
                                        <h1 class="display-one">My Blog!</h1>
                                        <p>Click on a post to read!</p>
                                    </div>
                                </div>                
                                @forelse($posts as $post)
                                    <ul>
                                        <li><a href="{{ route('post.show', $post) }}">{{ ucfirst($post->title) }}</a> in {{ $post->category_id }}</li>
                                        <p>{!! $post->body !!}</p> 
                                        <p>{!! $post->created_at !!}</p>
                                    </ul>
                                @empty
                                    <p class="text-warning">No blog Posts available</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection