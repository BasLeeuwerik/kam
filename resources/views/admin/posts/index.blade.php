<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog index') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('admin.posts.create') }}">Create post</a>
                <br><br>
                <table class="table table-xl">
                    <thead>
                        <tr>
                            <th>Post title</th>
                            <th>Date</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td><a href="{{ route('admin.posts.show', $post) }}">{{ ucfirst($post->title) }}</a></td>
                                <td>{!! $post->created_at->format('d/m/Y') !!}</td>
                                <td>{{ $post->category->title }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
</x-app-layout>