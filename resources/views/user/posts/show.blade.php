<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex">
                        <p>{{ $post->name }}</p>
                        <p class="ml-4">{{ $post->created_at }}</p>
                    </div>
                    <div class="main-content mt-2">
                        <p>{{ $post->title }}</p>
                        <p class="mt-4">{{ $post->body }}</p>
                    </div>
                </div>
            </div>
            <div class="back_button flex">
                <button type="button" onclick="location.href='{{ route('user.posts.index') }}'"
                    class="bg-indigo-600 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg text-white">戻る</button>
                @if (Auth::user()->name == $post->name)
                    <button type="button" onclick="location.href='{{ route('user.posts.edit', ['post' => $post->id]) }}'"
                        class="text-white bg-indigo-600 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">編集する</button>
                    <form method="post" action="{{ route('user.posts.destroy', ['post' => $post->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit"
                            class="text-white bg-indigo-600 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">削除する</button>
                    </form>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
