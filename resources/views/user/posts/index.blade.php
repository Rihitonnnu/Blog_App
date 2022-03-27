<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($e_all as $e_post)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <article class="article-item">
                            <div class="article-title">{{ $e_post->name }}</div>
                            <div class="article-title">{{ $e_post->title }}</div>
                            <div class="article-title">{{ $e_post->created_at }}</div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
