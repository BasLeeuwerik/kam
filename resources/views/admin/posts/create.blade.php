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
                <form method="POST" action="{{ route('admin.posts.store') }}">
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @csrf
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Category</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="title" placeholder="post title placehorder" value="{{ old('title') }}"></td>
                                    <td><input type="text" name="body" placeholder="here you can write a body" value="{{ old('body') }}"></td>
                                    <td><label name="category">
                                        <select name="category_id" id="category_id" required>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                                >{{ ucwords($category->title) }}</option>
                                            @endforeach
                                    </td>
                                </tr></select>
                            </tbody>
                    </table>
                    <button>Publish post</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>