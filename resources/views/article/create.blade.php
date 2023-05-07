<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 min-h-min flex flex-col">
                @if(Session::has('success'))
                    <div role="alert">
                        <div class="bg-gray-700 text-white font-bold rounded-t px-4 py-2">
                            Success
                        </div>
                        <div class="border border-t-0 border-gray-500 rounded-b bg-gray-500 px-4 py-3 text-white">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    </div> <br>
                    @php
                        Session::forget('success');
                    @endphp
                @endif

                @if( $errors->any() )
                    <div role="alert">
                        <div class="bg-red-700 text-white font-bold rounded-t px-4 py-2">
                            Failed
                        </div>
                        <div class="border border-t-0 border-red-500 rounded-b bg-white px-4 py-3 text-gray-700">
                            <strong>Whoops!</strong> There were some problems with your input.
                        </div>
                    </div> <br>
                @endif  

                <form method="POST" action="{{ url('article/create') }}" class="w-full max-w-lg" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title-input">
                                Title
                            </label>
                            <input name="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('title') border-red-500 @enderror border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title-input"placeholder="Put ur article title here">
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="img-input">
                                Article Image
                            </label>
                            <input type="file" name="file" id="img-input">
                            @error('file')
                                <br>
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="content-input">
                                Content
                            </label>
                            <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="content" id="content-input" cols="30" rows="10"></textarea>
                            @error('content')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="max-w-fit bg-gray-700 dark:bg-gray-700 dark:text-white hover:bg-gray-500 text-white font-bold py-2 px-4 rounded my-2">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
