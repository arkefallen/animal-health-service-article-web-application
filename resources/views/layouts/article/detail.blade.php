@extends('layouts/master')

@section('title')
<title>Detail Artikel</title>
@endsection

@section('content')

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <a href="{{ route('article') }}">
                <button class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                    <svg class="-ml-1 mr-1.5 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                    Kembali
                </button>
            </a>
            <h2 class="py-4 my-2 text-3xl font-semibold leading-none text-gray-900 md:text-2xl dark:text-white">{{ $article->title }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 py-4">
                <div>
                    <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Kategori</p>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $article->category->category_name }}</p>
                </div>
                <div>
                    <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Penulis</p>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ $article->author }}</p>
                </div>
                <div>
                    <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal Terbit</p>
                    <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">{{ date('d F Y', strtotime($article->date)) }}</p>
                </div>
            </div>
            <div>
                <p class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Isi Konten</p>
                <p class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400"><?php echo $article->content?></p>
            </div>
        </div>
    </section>
</body>
@endsection