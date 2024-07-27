@extends('user.layout')

@section('content')
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-bold mb-6">Hasil Pencarian untuk "<span class="text-blue-700">{{ request()->input('query') }}</span>"</h1>
        <div id="news-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($news as $newsItem)
                <a href="{{ route('news.detail', $newsItem->id) }}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 transition-transform transform hover:scale-105">
                    <img class="object-cover w-full h-40 rounded-t-lg" src="{{ asset('storage/' . $newsItem->image_url) }}" alt="{{ $newsItem->title }}">
                    <div class="flex flex-col justify-between p-4 leading-normal text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">{{ \Carbon\Carbon::parse($newsItem->date)->format('F j, Y') }} - {{ $newsItem->category->name }}</p>
                        <h5 class="mb-1 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $newsItem->title }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
        <div id="pagination" class="mt-8">
            {{ $news->links() }}
        </div>
    </div>
@endsection
