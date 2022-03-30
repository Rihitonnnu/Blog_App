<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            削除済み投稿一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($expiredPosts as $expiredPost)
                        <div class="p-6 bg-white border-b border-gray-200 flex">
                                <div class="article-thumbnail w-16 mr-6">
                                    <img class="" src="{{asset('storage/posts/'.$expiredPost->thumbnail)}}"/>
                                </div>
                                <div>
                                    <div class="article-title">{{ $expiredPost->name }}</div>
                                    <div class="article-title">{{ $expiredPost->title }}</div>
                                    <div class="article-title">{{ $expiredPost->deleted_at->diffForHumans() }}</div>
                                </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
