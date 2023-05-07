<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 min-h-min flex flex-col">
                <a href="{{ route('create-article') }}" class="max-w-fit bg-gray-700 dark:bg-gray-700 dark:text-white hover:bg-gray-500 text-white font-bold py-2 px-4 rounded my-2">
                    Add new Article
                </a>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Article Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Article Content
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $article)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                {{ $article->title }}
                            </th>
                            <td class="px-6 py-4 text-gray-900">
                                {{ $article->content }}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{ $article->name }} <br/>
                                {{ $article->email }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a> <br>
                                <a href="#" class="font-medium text-blue-600 hover:underline">Preview Article</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">There are no users.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <br>
                {!! $articles->withQueryString()->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>
</x-app-layout>
