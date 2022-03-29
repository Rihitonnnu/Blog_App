<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿編集画面
        </h2>
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('user.posts.update', ['post' => $post_edit->id]) }}">
        @csrf
        @method('put')
        <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">タイトルと投稿内容を編集してください。</p>
                </div>
                <div class="p-2 w-1/2 mx-auto">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">タイトル ※必須</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post_edit->title) }}"
                            required
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="pt-2 mb-4 mt-4">
                            <div class="relative">
                                <div class="p-2 w-full">
                                    <label for="body" class="leading-7 text-sm text-gray-600">サムネイル</label>
                                    <input type="file" name="thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="body" class="leading-7 text-sm text-gray-600">投稿内容 ※必須</label>
                                <textarea id="body" name="body" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('body', $post_edit->body) }}</textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-app-layout>
